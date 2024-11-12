<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @var array $arResult
 */
if ($arResult["isFormErrors"] == "Y") :
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

        <?php // $arResult["FORM_HEADER"]    ?>
        <form name="<?= $arResult["WEB_FORM_NAME"] ?>" action="<?= POST_FORM_ACTION_URI ?>" method="POST"  class="contact-form__form" enctype="multipart/form-data">
            <input type="hidden" name="WEB_FORM_ID" value="<?= $arParams["WEB_FORM_ID"] ?>">
            <?= bitrix_sessid_post() ?>

            <div class="contact-form__form-inputs">

                <div class="input contact-form__input">
                    <label class="input__label" for="medicine_name">
                        <div class="input__label-text">
                            <?= $arResult["QUESTIONS"]['medicine_name']['CAPTION'] ?>
                            <?php if ($arResult["QUESTIONS"]['medicine_name']['REQUIRED'] === 'Y') : ?>
                                <span class="form-required starrequired">*</span>
                            <?php endif; ?>
                        </div>
                        <?= $arResult["QUESTIONS"]['medicine_name']['HTML_CODE'] ?>
                        <div class="input__notification">
                            <?= $arResult['FORM_ERRORS']['medicine_name'] ?? '' ?>
                        </div>
                    </label>
                </div>

                <div class="input contact-form__input">
                    <label class="input__label" for="medicine_company">
                        <div class="input__label-text">
                            <?= $arResult["QUESTIONS"]['medicine_company']['CAPTION'] ?>
                            <?php if ($arResult["QUESTIONS"]['medicine_company']['REQUIRED'] === 'Y') : ?>
                                <span class="form-required starrequired">*</span>
                            <?php endif; ?>
                        </div>
                        <?= $arResult["QUESTIONS"]['medicine_company']['HTML_CODE'] ?>
                        <div class="input__notification">
                            <?= $arResult['FORM_ERRORS']['medicine_company'] ?? '' ?>
                        </div>
                    </label>
                </div>

                <div class="input contact-form__input">
                    <label class="input__label" for="medicine_email">
                        <div class="input__label-text">
                            <?= $arResult["QUESTIONS"]['medicine_email']['CAPTION'] ?>
                            <?php if ($arResult["QUESTIONS"]['medicine_email']['REQUIRED'] === 'Y') : ?>
                                <span class="form-required starrequired">*</span>
                            <?php endif; ?>
                        </div>
                        <?= $arResult["QUESTIONS"]['medicine_email']['HTML_CODE'] ?>
                        <div class="input__notification">
                            <?= $arResult['FORM_ERRORS']['medicine_email'] ?? '' ?>
                        </div>
                    </label>
                </div>

                <div class="input contact-form__input">
                    <label class="input__label" for="medicine_phone">
                        <div class="input__label-text">
                            <?= $arResult["QUESTIONS"]['medicine_phone']['CAPTION'] ?>
                            <?php if ($arResult["QUESTIONS"]['medicine_phone']['REQUIRED'] === 'Y') : ?>
                                <span class="form-required starrequired">*</span>
                            <?php endif; ?>
                        </div>
                        <?= $arResult["QUESTIONS"]['medicine_phone']['HTML_CODE'] ?>
                        <div class="input__notification">
                            <?= $arResult['FORM_ERRORS']['medicine_phone'] ?? '' ?>
                        </div>
                    </label>
                </div>
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


                <input type="hidden" name="web_form_submit" value="Y"/>

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









 endif;