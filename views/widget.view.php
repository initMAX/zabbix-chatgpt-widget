<?php
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

/**
 * OpenAI widget view.
 *
 * @var CView $this
 * @var array $data
 */

(new CWidgetView($data))
    ->addItem(
        (new CDiv([
            (new CDiv([
                (new CImg($this->getAssetsPath() . '/img/initmax.svg', 'Logo of initMAX s.r.o.'))
                    ->addStyle('height: 2.5rem;')
                ,    
            ]))
                ->addClass('chat-header')
            ,
            (new CDiv([/*
                    (new CDiv([
                        (new CDiv(''))
                            ->addClass('chat-log-message-author')
                            ->addClass('chat-log-message-author-bot')
                        ,
                        (new CDiv([
                            (new CDiv(''))
                                ->addClass('dot-flashing')
                            ]))
                            ->addClass('chat-log-message-text')
                        ]))
                        ->addClass('chat-log-message chat-log-message-bot')
                    ,
                    (new CDiv([
                        (new CDiv(''))
                            ->addClass('chat-log-message-author')
                            ->addClass('chat-log-message-author-user')
                        ,
                        (new CDiv('lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'))
                            ->addClass('chat-log-message-text')
                            ->addClass('chat-log-message-text-user')
                        ]))
                        ->addClass('chat-log-message chat-log-message-user')
                    ,
                    (new CDiv([
                        (new CDiv(''))
                            ->addClass('chat-log-message-author')
                            ->addClass('chat-log-message-author-bot')
                        ,
                        (new CDiv('pokus bot'))
                            ->addClass('chat-log-message-text')
                        ]))
                        ->addClass('chat-log-message chat-log-message-bot')
                    ,*/
                ]))
                ->setId('chat-log')
                ->addClass('chat-log')
            ,
            (new CDiv([
                (new CInput('text'))
                    ->addClass('chat-form-message')
                    ->setAttribute('placeholder', _('Send a message'))
                ,
                (new CButton('send-button', '➜'))
                    ->addClass('chat-form-button')
                    ->setAttribute('type', 'submit')
                ,
                ]))
                ->addClass('chat-form')
            ,
        ]))
        ->setId('chat-container')
        ->addClass('chat-container')
        ->setAttribute('api-token', $data['fields_values']['token'])
        //->onClick('CWidgetOpenAI.sendMessage()')
    )
->show();
