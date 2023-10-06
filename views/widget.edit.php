<?php declare(strict_types = 0);

use Zabbix\Widgets\Fields\CWidgetFieldTextBox;

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
 * Problems widget form view.
 *
 * @var CView $this
 * @var array $data
 */

 (new CWidgetFormView($data))
    ->addField(
        new CWidgetFieldTextBoxView($data['fields']['token'])
    )
    ->addFieldset((new CWidgetFormFieldsetCollapsibleView(_('Advanced configuration (PRO version)')))
        ->addField(
            new CWidgetFieldSelectView($data['fields']['model'])
        )
        ->addField(
            (new CWidgetFieldTextBoxView($data['fields']['temperature']))
                ->setFieldHint(
                    makeHelpIcon(_('What sampling temperature to use, between 0 and 2. Higher values like 0.8 will make the output more random, while lower values like 0.2 will make it more focused and deterministic.'), 'icon-help')
                )
        )
        ->addField(
            (new CWidgetFieldTextBoxView($data['fields']['top_p']))
                ->setFieldHint(
                    makeHelpIcon(_('An alternative to sampling with temperature, called nucleus sampling, where the model considers the results of the tokens with top_p probability mass. So 0.1 means only the tokens comprising the top 10% probability mass are considered.'), 'icon-help')
                )
        )
        ->addField(
            (new CWidgetFieldTextBoxView($data['fields']['max_tokens']))
                ->setFieldHint(
                    makeHelpIcon(_('The maximum number of tokens to generate in the completion.'), 'icon-help')
                )
        )
        ->addField(
            (new CWidgetFieldTextBoxView($data['fields']['n']))
                ->setFieldHint(
                    makeHelpIcon(_('How many completions to generate for each prompt.'), 'icon-help')
                )
        )
    )
    ->addItem([new CDiv('💬 Contact us for more modules or for PRO version'), new CDiv(new CLink('info@initmax.com', 'mailto:info@initmax.com'))])
    ->includeJsFile('widget.edit.js.php')
    ->addJavaScript('widget_openai_form.init();')
	->show();
