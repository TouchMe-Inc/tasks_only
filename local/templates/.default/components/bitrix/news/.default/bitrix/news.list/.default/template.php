<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="article-list">
    <?php if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?><br/>
    <?php endif; ?>
    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
        <?php
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('NEWS_DELETE_CONFIRM')));
        ?>
        <a class="article-item article-list__item" href="<?= $arItem["DETAIL_PAGE_URL"] ?>"
           id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <?php if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                <div class="article-item__background">
                    <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                         width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
                         height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
                         alt="<?= $arItem["NAME"] ?>"
                         title="<?= $arItem["NAME"] ?>"
                    />
                </div>
            <?php endif; ?>
            <div class="article-item__wrapper">
                <?php if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                    <div class="article-item__title"><?php echo $arItem["NAME"] ?></div>
                <?php endif; ?>
                <?php if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                    <div class="article-item__content"><?php echo $arItem["PREVIEW_TEXT"]; ?></div>
                <?php endif; ?>
            </div>
        </a>
    <?php endforeach; ?>
</div>
<?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?= $arResult["NAV_STRING"] ?>
<?php endif; ?>

