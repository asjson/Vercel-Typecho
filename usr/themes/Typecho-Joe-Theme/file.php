<?php

/**
 * 归档
 * 
 * @package custom 
 * 
 **/

?>
<?php $this->need('public/prevent.php'); ?>
<?php $this->need('public/defend.php'); ?>

<?php
if (isset($_POST['agree'])) {
    if ($_POST['agree'] == $this->cid) {
        exit(agree($this->cid));
    }
    exit('error');
}
?>
<!DOCTYPE html>
<html lang="en" data-color-mode="<?php if($_COOKIE['night']=='1')echo 'dark';else echo 'light'; ?>">

<head>
    <?php $this->need('public/head.php'); ?>
</head>

<body>
    <?php $this->options->JCustomBodyStart() ?>

    <section id="joe">
        <!-- 头部 -->
        <?php $this->need('public/header.php'); ?>

        <!-- 主体 -->
        <section class="container j-post">
            <section class="j-adaption">

                <!-- 伸缩侧边栏 -->
                <section class="j-stretch">
                    <section class="contain">
                        <svg viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1024 894.976c0 71.68-51.2 129.024-114.688 129.024H116.736c-63.488 0-114.688-57.344-114.688-129.024V129.024C0 57.344 51.2 0 116.736 0h790.528c63.488 0 114.688 57.344 114.688 129.024v765.952zM987.136 155.648c0-65.536-47.104-118.784-106.496-118.784H145.408c-59.392 0-108.544 53.248-108.544 118.784v712.704c0 65.536 47.104 118.784 106.496 118.784h735.232c59.392 0 106.496-53.248 106.496-118.784V155.648z m0 0" p-id="17709"></path>
                            <path d="M923.648 288.768c0 32.768-24.576 57.344-55.296 57.344H165.888c-30.72 0-55.296-26.624-55.296-57.344V172.032c0-32.768 24.576-57.344 55.296-57.344h702.464c30.72 0 55.296 26.624 55.296 57.344v116.736z m0 0M638.976 851.968a57.344 57.344 0 0 1-57.344 57.344H169.984a57.344 57.344 0 0 1-57.344-57.344V475.136a57.344 57.344 0 0 1 57.344-57.344h411.648a57.344 57.344 0 0 1 57.344 57.344v376.832z m0 0M931.84 851.968a57.344 57.344 0 0 1-57.344 57.344h-112.64a57.344 57.344 0 0 1-57.344-57.344V475.136a57.344 57.344 0 0 1 57.344-57.344h112.64a57.344 57.344 0 0 1 57.344 57.344v376.832z m0 0" p-id="17710"></path>
                        </svg>
                    </section>
                </section>


                <section class="main">
                    <!-- 分类 -->
                    <?php $this->need('component/post.classify.php'); ?>

                    <!-- 标题 -->
                    <?php $this->need('component/post.header.php'); ?>

                    <?php $this->need('component/file.list.php'); ?>

                    <!-- 赞赏点赞 -->
                    <?php $this->need('component/post.fabulous.php'); ?>

                    <!-- 版权 -->
                    <?php if ($this->options->JBanQuanStatus === 'on') : ?>
                        <?php $this->need('component/post.banquan.php'); ?>
                    <?php endif; ?>
                </section>

              
            </section>

            <?php if ($this->options->JPostAsideStatus === 'on' && $this->fields->aside !== 'off') : ?>
                <?php $this->need('public/aside.php'); ?>
            <?php endif; ?>
        </section>



        <!-- 弹幕 -->
        <?php if ($this->options->JBarragerStatus === 'on') : ?>
            <ul class="j-barrager-list">
                <?php $this->comments()->to($comments); ?>
                <?php while ($comments->next()) : ?>
                    <li>
                        <span class="j-barrager-list-avatar" data-src="<?php ParseAvatar($comments->mail); ?>"></span>
                        <span class="j-barrager-list-content"><?php $comments->excerpt(); ?></span>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>



        <!-- 尾部 -->
        <?php $this->need('public/footer.php'); ?>
    </section>



    <!-- 配置文件 -->
    <?php $this->need('public/config.php'); ?>
</body>

</html>