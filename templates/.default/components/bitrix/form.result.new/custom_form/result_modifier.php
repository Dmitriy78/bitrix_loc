<?php

foreach ($arResult["QUESTIONS"] as $FIELD_SID => &$arQuestion) {

    $required = ($arQuestion['REQUIRED'] == 'Y') ?
        "required=''" : '';

    $params = '';

    $field_type = 'text';

    if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'text') {

        $value = $arResult['arrVALUES']['form_text_' . $arQuestion['STRUCTURE'][0]['ID']] ?? '';

        if (strpos($arQuestion['STRUCTURE'][0]['FIELD_PARAM'], 'phone') !== false) {
            $field_type = 'tel';

            $params = "data-inputmask='\"mask\": \"+79999999999\", \"clearIncomplete\": \"true\" ' maxlength='12' x-autocompletetype='phone-full' ";
        }

        if (strpos($arQuestion['STRUCTURE'][0]['FIELD_PARAM'], 'email') !== false) {
            $field_type = 'email';
        }

        $arQuestion["HTML_CODE"] = "<input type='{$field_type}' class='input__input' id='{$FIELD_SID}' name='form_text_{$arQuestion['STRUCTURE'][0]["ID"]}' value='{$value}' {$params} {$required} >";
    }

    if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea') {

        $value = $arResult['arrVALUES']['form_textarea_' . $arQuestion['STRUCTURE'][0]['ID']] ?? '';

        $arQuestion["HTML_CODE"] = "<textarea class='input__input' type='{$field_type}' id='{$FIELD_SID}' name='form_textarea_{$arQuestion['STRUCTURE'][0]["ID"]}' {$params} {$required} >{$value}</textarea>";
    }
}