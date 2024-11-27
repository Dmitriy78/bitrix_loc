<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="article-card">
    <?php if ($arParams["DISPLAY_NAME"] != "N" && $arResult["NAME"]): ?>
        <div class="article-card__title"><?= $arResult["NAME"] ?></div>
    <?php endif; ?>

    <?php if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
        <div class="article-card__date"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></div>
    <?php endif; ?>

    <div class="article-card__content">
        <?php if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])): ?>
            <div class="article-card__image sticky">
                <img src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" width="<?= $arResult["DETAIL_PICTURE"]["WIDTH"] ?>" height="<?= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?>" alt="<?= $arResult["NAME"] ?>"  title="<?= $arResult["NAME"] ?>" data-object-fit="cover" />
            </div>
        <?php endif ?>


        <div class="article-card__text">
            <div class="block-content" data-anim="anim-3">
                <?php if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arResult["FIELDS"]["PREVIEW_TEXT"]): ?>
                    <p><?=
                        $arResult["FIELDS"]["PREVIEW_TEXT"];
                        unset($arResult["FIELDS"]["PREVIEW_TEXT"]);
                        ?></p>
                <?php endif; ?>
                <?php if ($arResult["NAV_RESULT"]): ?>
                        <?php if ($arParams["DISPLAY_TOP_PAGER"]): ?><?= $arResult["NAV_STRING"] ?><br /><?php endif; ?>
                        <?php echo $arResult["NAV_TEXT"]; ?>
                    <?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?><br /><?= $arResult["NAV_STRING"] ?><?php endif; ?>
                <?php elseif ($arResult["DETAIL_TEXT"] <> ''): ?>
                    <?php echo $arResult["DETAIL_TEXT"]; ?>
                <?php else: ?>
                    <?php echo $arResult["PREVIEW_TEXT"]; ?>
                <?php endif ?>
                <div style="clear:both"></div>
                <br />
                <?php foreach ($arResult["FIELDS"] as $code => $value): ?>
                    <?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?= $value; ?>
                    <br />
                <?php endforeach; ?>
                <?php foreach ($arResult["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>

                    <?= $arProperty["NAME"] ?>:&nbsp;
                    <?php if (is_array($arProperty["DISPLAY_VALUE"])): ?>
                        <?= implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]); ?>
                    <?php else: ?>
                        <?= $arProperty["DISPLAY_VALUE"]; ?>
                    <?php endif ?>
                    <br />
                <?php endforeach; ?>
            </div>

            <a class="article-card__button" href="<?= $arResult["LIST_PAGE_URL"] ?>">
                <?php // echo GetMessage("T_NEWS_DETAIL_BACK") ?>
                Назад к новостям
            </a>

        </div>
    </div>
</div>