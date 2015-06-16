<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive product landing page.">
    <title>Class Helper!</title>

    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="/static/css/layouts/side-menu-old-ie.css.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="/static/css/layouts/side-menu.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="/static/css/style.css">
</head>
<body>
    <div id="layout">
        <a href="#menu" id="menuLink" class="menu-link">
            <span></span>
        </a>

        <!--
        <div id="menu">
            <div class="pure-menu">
                <a class="pure-menu-heading" href="#">ClassHelper</a>

                <ul class="pure-menu-list">
                    <li class="pure-menu-item pure-menu-selected"><a href="#" class="pure-menu-link">홈</a></li>
                    <li class="pure-menu-item"><a href="/About" class="pure-menu-link">About</a></li>
                    <li class="pure-menu-item"><a href="/Seat" class="pure-menu-link">자리바꾸기</a></li>
                    <li class="pure-menu-item"><a href="/Clean" class="pure-menu-link">청소바꾸기</a></li>
                    <li class="pure-menu-item"><a href="#" class="pure-menu-link">로그인</a></li>
                </ul>
            </div>
        </div>
        -->
        <div id="menu">
            <div class="pure-menu">
                <a class="pure-menu-heading" href="#">ClassHelper</a>

                <ul class="pure-menu-list">
                    <li class="pure-menu-item"><a href="/" class="pure-menu-link">홈</a></li>
                    <li class="pure-menu-item"><a href="/Seat" class="pure-menu-link">자리바꾸기</a></li>
                    <li class="pure-menu-item"><a class="pure-menu-link" onclick="alert('개발중입니다.');">청소바꾸기</a></li>
                </ul>
            </div>
        </div>

        <div id="main">
<!--
    <?php if(isset($jumb)) { ?>
    <div class="content-wrapper">
        <div class="splash-container">
            <div class="splash">
                <h1 class="splash-head">ClassHelper</h1>
                <p class="splash-subhead">
                    자리바꾸기, 청소바꾸기 등을 온라인에서 바로 관리하세요!
                </p>
                <p>
                    <a href="/" class="pure-button pure-button-primary">자세히 보기</a>
                </p>
            </div>
        </div>
    </div>ㅇ    <?php } ?>
            -->