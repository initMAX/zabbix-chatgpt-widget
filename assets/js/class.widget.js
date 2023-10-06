/*
** initMAX
** Copyright (C) 2021-2022 initMAX s.r.o.
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 3 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
**/

class CWidgetOpenAI extends CWidget {

    apiToken = this._fields.token;
    apiEndpoint = 'https://api.openai.com/v1/chat/completions';

    setContents(response) {
        super.setContents(response);

        this.userInput = this._body.querySelector('.chat-form-message');
        this.chatLog = this._body.querySelector('.chat-log');

        this._body.querySelector('.chat-form-message').addEventListener('keydown', e => {
            if (e.code == 'Enter' || e.code == 'NumpadEnter') {
                this.sendMessage();
            }
        });
        this._body.querySelector('.chat-form-button').addEventListener('click', this.sendMessage.bind(this));
    }

    async sendMessage() {
        const question = this.userInput.value;
        this.userInput.value = '';

        if (!question) {
            return;
        }

        const myMessagePromise = new Promise((resolve, reject) => {
            resolve(question);
        });

        const myMessage = this.createMessage(myMessagePromise, 'user');
        this.chatLog.appendChild(myMessage);

        const botMessagePromise = new Promise(async (resolve, reject) => {

            try {
                const request = await fetch(this.apiEndpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${this.apiToken}`
                    },
                    body: JSON.stringify({
                        model: 'gpt-3.5-turbo',
                        messages: [
                            {
                                role: 'user',
                                content: question,
                            },
                        ],
                        //max_tokens: 50,
                    })
                });
            
                const response = await request.json();
                const reply = response.choices[0].message.content;

                resolve(reply);
            } catch (error) {
                reject('Error sending message to OpenAI: ' + error + '!');
            }
        });
        
        const botMessage = this.createMessage(botMessagePromise, 'bot');
        this.chatLog.appendChild(botMessage);
        this.chatLog.scrollTop = this.chatLog.scrollHeight;
    }

    createMessage(messagePromise, sender) {
        if (!(sender === 'user' || sender === 'bot')) {
            return null;
        }

        const message = document.createElement('div');
        message.classList.add('chat-log-message', `chat-log-message-${sender}`);

        messagePromise.then(text => {
            message.querySelector('.chat-log-message-text').textContent = text;
        }).catch(error => {
            message.querySelector('.chat-log-message-text').textContent = error;
        }).finally(() => {
            this.chatLog.scrollTop = this.chatLog.scrollHeight;
        });
        
        message.insertAdjacentHTML(
            'beforeend',
            `<div class="chat-log-message-author chat-log-message-author-${sender}"></div>
             <div class="chat-log-message-text chat-log-message-text-${sender}"><div class="dot-flashing"></div></div>`
        );

        return message;
    }

    hasPadding () {
        return false;
    }
}
