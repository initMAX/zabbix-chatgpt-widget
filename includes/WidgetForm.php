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

namespace Modules\OpenAI\Includes;

use Zabbix\Widgets\CWidgetField;
use Zabbix\Widgets\CWidgetForm;
use Zabbix\Widgets\Fields\CWidgetFieldSelect;
use Zabbix\Widgets\Fields\CWidgetFieldTextBox;

/**
 * OpenAI widget form.
 */
class WidgetForm extends CWidgetForm {
/*
    protected function normalizeValues(array $values): array {
		$values = self::convertDottedKeys($values);

		return $values;
	}
*/
    public function addFields(): self {
        return $this
            ->addField(
                (new CWidgetFieldTextBox('token', _('Token')))
                    ->setFlags(CWidgetField::FLAG_NOT_EMPTY | CWidgetField::FLAG_LABEL_ASTERISK)
            )
            ->addField(
                (new CWidgetFieldSelect('model', _('Model'), [
                        0 => 'GPT-3.5 Turbo',
                        1 => 'Other models are available in PRO version',
                    ]))
                    ->setDefault(0)
                    ->setFlags(CWidgetField::FLAG_DISABLED)
            )
            ->addField(
                (new CWidgetFieldTextBox('temperature', _('Temperature')))
                    ->setDefault('1')
                    ->setFlags(CWidgetField::FLAG_DISABLED)
            )
            ->addField(
                (new CWidgetFieldTextBox('top_p', _('Top P')))
                    ->setDefault('1')
                    ->setFlags(CWidgetField::FLAG_DISABLED)
            )
            ->addField(
                (new CWidgetFieldTextBox('max_tokens', _('Max tokens')))
                    ->setDefault('16')
                    ->setFlags(CWidgetField::FLAG_DISABLED)
            )
            ->addField(
                (new CWidgetFieldTextBox('n', _('N')))
                    ->setDefault('1')
                    ->setFlags(CWidgetField::FLAG_DISABLED)
            )
        ;
    }
}
