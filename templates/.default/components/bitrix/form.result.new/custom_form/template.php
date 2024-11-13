<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @var array $arResult
 */
if ($arResult["isFormErrors"] == "Y"):
    ?>
    <?= $arResult["FORM_ERRORS_TEXT"]; ?>
<?php endif; ?>

<?= $arResult["FORM_NOTE"] ?? '' ?>

<?php if ($arResult["isFormNote"] != "Y") : ?>

    <div class="contact-form">
        <div class="contact-form__head">
            <div class="contact-form__head-title">
                <?php if ($arResult["isFormTitle"]) : ?>
                    <h3><?= $arResult["FORM_TITLE"] ?></h3>
                <?php endif; ?>
            </div>
            <div class="contact-form__head-text">
                <?php if ($arResult["isFormDescription"]) : ?>
                    <h3><?= $arResult["FORM_DESCRIPTION"] ?></h3>
                <?php endif; ?>
            </div>
        </div>

        <?php // $arResult["FORM_HEADER"]   ?>
        <form name="<?= $arResult["WEB_FORM_NAME"] ?>" action="<?= POST_FORM_ACTION_URI ?>" method="POST"  class="contact-form__form" enctype="multipart/form-data">
            <input type="hidden" name="WEB_FORM_ID" value="<?= $arParams["WEB_FORM_ID"] ?>">
            <?= bitrix_sessid_post() ?>

            <div class="contact-form__form-inputs">

                <?php foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) : ?>

                    <?php if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') : ?>
                        <?= $arQuestion["HTML_CODE"]; ?>
                    <?php elseif ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'text') : ?>

                        <div class="input contact-form__input">
                            <label class="input__label" for="<?= $FIELD_SID ?>">
                                <div class="input__label-text">
                                    <?= $arQuestion["CAPTION"] ?>
                                    <?php if ($arQuestion["REQUIRED"] == "Y"): ?>
                                        <?= $arResult["REQUIRED_SIGN"]; ?>
                                    <?php endif; ?>
                                </div>
                                <?= $arQuestion["HTML_CODE"] ?>

                                <?php if (isset($arResult["FORM_ERRORS"][$FIELD_SID])): ?>
                                    <div class="input__notification">
                                        <?= htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID]) ?>
                                    </div>
                                <?php endif; ?>
                            </label>
                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="contact-form__form-message">
                <div class="input">
                    <label class="input__label" for="medicine_message">
                        <div class="input__label-text">
                            <?= $arResult["QUESTIONS"]['medicine_message']['CAPTION'] ?>
                            <?= ($arResult["QUESTIONS"]['medicine_message']['REQUIRED'] === 'Y' ? ' *' : '') ?>
                        </div>
                        <?= $arResult["QUESTIONS"]['medicine_message']['HTML_CODE'] ?>
                        <div class="input__notification">
                            <?= $arResult['FORM_ERRORS']['medicine_message'] ?? '' ?>
                        </div>
                    </label>
                </div>
            </div>

            <div class="contact-form__bottom">
                <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                    ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                    данных&raquo;.
                </div>

                <input type="hidden" name="web_form_submit" value="1"/>

                <button class="form-button contact-form__bottom-button" data-success="Отправлено"
                        data-error="Ошибка отправки">
                    <div class="form-button__title">
                        <?= htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?>
                    </div>
                </button>
            </div>
            <?= $arResult["FORM_FOOTER"] ?>
    </div>

    <?php
 endif ;