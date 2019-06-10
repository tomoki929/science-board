<nav>
    <a href=<?php echo url("/") ?> class="box on">
        <div class="box-inner">
        <p class="fa fa-crown"></p>
        <p class="label">人気順</p>
        </div>
    </a>
    <a href=<?php echo url("/messages/timeline") ?> class="box on">
        <div class="box-inner">
        <p class="fas fa-clock"></p>
        <p class="label">新着順</p>
        </div>
    </a>
    <a href=<?php echo url("/categories") ?> class="box on">
        <div class="box-inner">
            <i class="fas fa-search"></i>
            <p class="label">見つける</p>
        </div>
    </a>
    <a href=<?php echo url("/messages/service") ?> class="box on">
        <div class="box-inner">
            <i class="fas fa-shield-alt"></i>
            <p class="label">使い方</p>
        </div>
    </a>
</nav>
<style>
    a {
        text-decoration: none;
    }
    a:hover {
    　  text-decoration: none;
    }
    .fa, .fas {
        display: block;
        font-size: 20px;
        margin-top: 2px;
        margin-bottom: 5px
    }
</style>