<?php
    $imgSrc = '';

    if ($type == 'blog') {
        $imgSrc = '/assets/img/icons/blog.svg';
    } elseif ($type == 'event') {
        $imgSrc = '/assets/img/icons/event.svg';
    } elseif ($type == 'release') {
        $imgSrc = '/assets/img/icons/release.svg';
    }
?>

<div class="news">
    <a><img class="icon" src="<?php echo $imgSrc; ?>" alt="Icon"></a>
    <div>
        <a><?php echo $title; ?></a>
        <a><?php echo $date; ?></a>
        <a href="<?php echo $link; ?>">Oui</a>
    </div>
</div>