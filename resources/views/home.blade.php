@extends('layouts.site')
@section('title', trans('site.home'))
@section('styles')
    <style>
        .single-post {
            margin-bottom: 5px;
        }

        .single-post span {
            font-size: 1rem;
            color: #000;
            font-weight: normal;
        }

        .owl-carousel .owl-item img {
            aspect-ratio: 6/4;
        }

        .who_we {
            box-shadow: inset 0px -8px 8px #fff !important;
            position: relative;
            padding-bottom: 200px !important;
            min-height: 600px;
            background-image: url({{ asset($info->who_image) }});
            background-size: 100% 100%;
            background-repeat: no-repeat
        }

        .who_we a {
            padding: 25px 75px !important;
            margin-top: 25px !important;
            position: absolute;
            bottom: 25%;
            right: 10%;
        }

        @media (max-width: 480px) {
            .who_we {

            box-shadow: inset 0px -8px 8px #fff, inset 0px 8px 8px #f8f8f8 !important;
                background-image: url({{ asset($info->who_image_mobile) }});
                background-size: 100% 100%;
                background-repeat: no-repeat
            }

            .who_we a {
            padding: 15px 55px !important;
                position: absolute;
                bottom: 60%;
                right: 10%;
                left: 50%;
                transform: translateX(-50%) !important;

            }
        }

        @media (max-width: 991.98px) {
            .servers {
                padding-bottom: 0;
            }
        }

        .main-footer {
            box-shadow: unset;
        }

        .banner-content h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        section.sectionCounter {
            width: 100%;
            height: 100%;
            direction: ltr;
            position: relative;
            text-align: left;
            background: transparent !important;
            display: flex;
            justify-content: center;
        }

        section.sectionCounter div.quote {
            position: absolute;
            top: 300px;
            right: 12%;
            background: url("../img/sv.jpg") no-repeat bottom;
            width: 499px;
            height: 208px;
        }

        section.sectionCounter div.circleWrapper {
            display: block;
            vertical-align: top;
            /* padding-left: 120px; */
        }

        section.sectionCounter div.circle {
            display: block;
            box-sizing: border-box;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            /* margin: 100px 0; */
            position: relative;
            z-index: 10;
            padding: 10px;
            border: none !important;
            background: #454a58;
            /* Old browsers */
        }

        div.circle .innerCircle {
            display: block;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            position: absolute;
            right: 90px;
            top: 90px;
            z-index: 2;
            border: none !important;
            background: #454a58;
            /* Old browsers */
        }

        div.circle .innerCircleI {
            display: block;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            position: absolute;
            right: 110px;
            top: 110px;
            z-index: 3;
            background: #2d3039;
            /* Old browsers */
        }

        div.circle .innerCircleI::after {
            content: '';
            display: block;
            width: 174px;
            height: 174px;
            border-radius: 50%;
            position: absolute;
            right: 3px;
            top: 3px;
            z-index: 4;
            background: #2D3039;
            /* Old browsers */
        }

        div.circle .innerCircleII {
            display: block;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            position: absolute;
            right: 125px;
            top: 125px;
            z-index: 5;
            background: #454a58;
            /* Old browsers */
        }

        div.circle .innerCircleII::before {
            content: '';
            display: block;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            position: absolute;
            right: 10px;
            top: 10px;
            z-index: 6;
            background: #727f92;
            /* Old browsers */
            background: -moz-linear-gradient(-45deg, #13161c 0%, #727f92 100%);
            /* FF3.6-15 */
            background: -webkit-linear-gradient(-45deg, #13161c 0%, #727f92 100%);
            /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(135deg, #13161c 0%, #727f92 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#cccccc', endColorstr='#fafafa', GradientType=1);
        }

        div.circle .middleCircle {
            display: block;
            width: 124px;
            height: 124px;
            border-radius: 50%;
            position: absolute;
            right: 138px;
            top: 138px;
            z-index: 5;
            background: #2D3039;
        }

        .pie {
            position: relative;
            z-index: 2;
            padding: 0;
            width: 380px;
            height: 380px;
            border-radius: 50%;
            list-style: none;
            -webkit-backface-visibility: hidden;
            -webkit-transition: all linear .5s;
            transition: all linear .5s;
        }

        .slice {
            /* remove slash at the end of this line to see full slice contents */
            overflow: hidden;
            /**/
            position: absolute;
            top: 0;
            right: 0;
            /* add slash at end of this line to show the red outline of the slice *
                                                                                    outline: solid 1px red; /**/
            width: 50%;
            height: 50%;
            transform-origin: 0% 100%;

            --slice-angle: 0;
            /* Default angle */
            transform: rotate(var(--slice-angle)) skewY(-18deg);
        }



        .slice-contents {
            position: absolute;
            left: -100%;
            width: 200%;
            height: 200%;
            border-radius: 50%;
            padding: 15px;
            color: #0D1216;
            font-size: 3em;
            text-align: center;
            transition: background-color .2s;
            overflow: hidden;
            cursor: pointer;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            position: absolute;
            left: -100%;
            width: 200%;
            height: 200%;
            border-radius: 50%;
            padding: 15px;
            color: #0D1216;
            font-size: 3em;
            text-align: center;
            transition: background-color .2s;
            overflow: hidden;
            cursor: pointer;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .slice-contents i:nth-of-type(2) {
            font-size: 3em;
            right: 30%;
            top: -10%;
            color: rgba(0, 0, 0, 0.1);
            position: absolute;
            z-index: -1;
        }

        .slice-contents i:nth-of-type(3) {
            font-size: 4em;
            right: 35%;
            top: -5%;
            color: rgba(255, 255, 255, .05);
            position: absolute;
            z-index: 1;
        }

        .slice:first-child .slice-contents {
            transform: skewY(18deg)
                /* unskew slice contents */
                rotate(30deg);
            /* rotate by half the central angle of the slice
                                                                                       which is 50deg in this case */
            background: rgb(173, 181, 189);
        }

        .slice:first-child .slice-contents .counterTitle {
            padding-right: 0px;
            max-width: 135px;
        }

        .slice:first-child .slice-contents .counterIcon {
            padding-right: 5px
        }

        .slice:first-child .slice-contents .counter {
            padding-right: 0px;
        }


        .slice:nth-child(6) .slice-contents .counterTitle {
            padding-right: 5px;
        }

        .slice:nth-child(6) .slice-contents .counterIcon {
            padding-right: 10px
        }

        .slice:nth-child(6) .slice-contents .counter {
            padding-right: 5px;
        }


        .slice:nth-child(2) .slice-contents {
            transform: skewY(18deg)
                /* unskew slice contents */
                rotate(30deg);
            /* rotate by half the central angle of the slice
                                                                                       which is 50deg in this case */
            background: rgb(206, 212, 218);
        }



        .slice:nth-child(2) .slice-contents i {
            transform: rotate(-72deg);
        }

        .slice:nth-child(3) .slice-contents {
            transform: skewY(18deg)
                /* unskew slice contents */
                rotate(30deg);
            /* rotate by half the central angle of the slice
                                                                                       which is 50deg in this case */
            background: rgb(222, 226, 230);
        }


        .slice:nth-child(4) .slice-contents {
            transform: skewY(18deg)
                /* unskew slice contents */
                rotate(30deg);
            /* rotate by half the central angle of the slice
                                                                                       which is 50deg in this case */
            background: rgb(230, 230, 233);
        }


        .slice:nth-child(4) .slice-contents i {
            transform: rotate(180deg);
        }

        .slice:nth-child(5) .slice-contents {
            transform: skewY(18deg)
                /* unskew slice contents */
                rotate(30deg);
            /* rotate by half the central angle of the slice
                                                                                       which is 50deg in this case */
            background: rgb(233, 236, 239);
        }


        .slice:nth-child(6) .slice-contents {
            transform: skewY(18deg)
                /* unskew slice contents */
                rotate(30deg);
            /* rotate by half the central angle of the slice
                                                                                       which is 50deg in this case */
            background: rgb(248, 249, 250);
        }


        .slice:nth-child(7) .slice-contents {
            transform: skewY(18deg)
                /* unskew slice contents */
                rotate(30deg);
            /* rotate by half the central angle of the slice
                                                                                       which is 50deg in this case */
            background: #d7f069;
        }

        .slice:nth-child(8) .slice-contents {
            transform: skewY(18deg)
                /* unskew slice contents */
                rotate(30deg);
            /* rotate by half the central angle of the slice
                                                                                       which is 50deg in this case */
            background: #69f0ae;
        }

        .slice:nth-child(8) .slice-contents:hover {
            background: #27654a !important;
        }

        div.circle .abs {
            width: 100%;
            height: 100%;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 3;
            pointer-events: none;
            -webkit-transition: all linear .5s;
            transition: all linear .5s;
        }

        div.circle .rel {
            width: 100%;
            height: 100%;
            position: relative;
            right: 0;
            top: 0;
        }

        div.circle .blinker {
            display: block;
            width: 26px;
            height: 26px;
            position: absolute;
            border-radius: 13px;
            background: #454a58 !important;
            overflow: hidden;
        }

        @keyframes blink {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(4);
            }
        }

        div.circle .blinker::before {
            content: '';
            display: block;
            width: 6px;
            height: 6px;
            position: absolute;
            border-radius: 3px;
            top: 9px;
            right: 10px;
            opacity: .8;
        }

        div.circle .blinker::after {
            content: '';
            display: block;
            width: 6px;
            height: 6px;
            position: absolute;
            border-radius: 3px;
            top: 9px;
            right: 10px;
        }

        div.circle .blinker.active::after {
            animation: blink 1s ease 0s infinite;
        }

        div.circle .blinker.web::before {
            background: #039be5;
        }

        div.circle .blinker.soft::before {
            background: #0097a7;
        }

        div.circle .blinker.hard::before {
            background: #006064;
        }

        div.circle .blinker.social::before {
            background: #00bfa5;
        }

        div.circle .blinker.bpm::before {
            background: #69f0ae;
        }

        div.circle .blinker.web::after {
            background: #039be5;
            animation-duration: .8s;
        }

        div.circle .blinker.soft::after {
            background: #0097a7;
            animation-duration: .9s;
        }

        div.circle .blinker.hard::after {
            background: #006064;
            animation-duration: .7s;
        }

        div.circle .blinker.social::after {
            background: #00bfa5;
            animation-duration: 1.1s;
        }

        div.circle .blinker.bpm::after {
            background: #69f0ae;
            animation-duration: 1.2s;
        }

        .blinker.web {
            top: 0;
            left: 187px;
            z-index: 10;
            background: #039be5;
        }

        .blinker.soft {
            top: 129px;
            left: 365px;
            z-index: 10;
            background: #0097a7;
        }

        .blinker.hard {
            top: 338px;
            left: 298px;
            z-index: 10;
            background: #006064;
        }

        .blinker.social {
            top: 338px;
            left: 77px;
            z-index: 10;
            background: #00bfa5;
        }

        .blinker.bpm {
            top: 129px;
            left: 9px;
            z-index: 10;
            background: #69f0ae;
        }

        div.circle .label {
            font: .8em 'IRBSans', Helvetica, sans-serif;
            display: block;
            height: 26px;
            line-height: 21px;
            position: absolute;
            border-radius: 13px;
            color: #fafafa;
        }

        .label.web {
            top: -35px;
            right: 157px;
            z-index: 10;
            background: #039be5;
        }

        .label.soft {
            top: 104px;
            right: -74px;
            z-index: 10;
            background: #0097a7;
        }

        .label.hard {
            top: 362px;
            right: -16px;
            z-index: 10;
            background: #006064;
        }

        .label.social {
            top: 362px;
            left: -19px;
            z-index: 10;
            background: #00bfa5;
        }

        .label.bpm {
            top: 104px;
            left: -116px;
            z-index: 10;
            background: #69f0ae;
            color: #454a58 !important;
        }

        div.sectionCounterDetail {
            position: absolute;
            top: 50px;
            left: 350px;
            padding-top: 50px;
            z-index: 2;
            direction: ltr;
            white-space: nowrap;
            width: auto;
            overflow: hidden;
        }

        div.sectionCounterDetail .sDetail {
            position: relative;
            display: inline-block;
            vertical-align: top;
            height: 400px;
            direction: rtl;
            padding: 50px 50px 30px 30px;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            background: #004d40;
        }

        div.sectionCounterDetail .leftB {
            position: relative;
            display: inline-block;
            vertical-align: top;
            width: 0;
            height: 0;
            border-top: 200px solid transparent;
            border-right: 250px solid #004d40;
            border-bottom: 200px solid transparent;
        }

        div.sectionCounterDetail .detailWrapper {
            position: relative;
            width: 0;
            height: 400px;
            -webkit-transition: all linear .5s;
            transition: all linear .5s;
        }

        div.sectionCounterDetail .detailWrapperAbs {
            position: absolute;
            top: 0;
            left: 0;
            display: none;
        }

        .sDetail.web {
            background: #039be5 !important;
        }

        .leftB.web {
            border-right-color: #039be5 !important;
        }

        .sDetail.soft {
            background: #0097a7 !important;
        }

        .leftB.soft {
            border-right-color: #0097a7 !important;
        }

        .sDetail.hard {
            background: #006064 !important;
        }

        .leftB.hard {
            border-right-color: #006064 !important;
        }

        .sDetail.social {
            background: #00bfa5 !important;
        }

        .leftB.social {
            border-right-color: #00bfa5 !important;
        }

        .sDetail.bpm {
            background: #69f0ae !important;
        }

        .leftB.bpm {
            border-right-color: #69f0ae !important;
        }

        div.sDetail .closeBtn {
            position: absolute;
            width: 30px;
            height: 30px;
            right: 10px;
            top: 10px;
            background: #2D3039;
            border-radius: 50%;
            text-align: center;
            cursor: pointer;
            color: #ddd;
        }

        div.sDetail .closeBtn:hover {
            color: #eee;
        }

        div.sDetail .closeBtn::after {
            content: '\f00d';
            font-family: 'FontAwesome', Helvetica, Arial, sans-serif;
            font-size: 1.25em;
            line-height: 30px;
        }

        div.sDetail h3 {
            font: 1em 'IRBSans', Helvetica, sans-serif;
            margin: 0;
            padding: 0 25px;
            position: absolute;
            right: 80px;
            top: -20px;
            color: #eee;
            background: #252831;
            height: 40px;
            border-radius: 20px;
            line-height: 40px;
        }

        div.sDetail div.paragraph {
            color: #eee;
            background: #3a3d46;
            /* Old browsers */
            background: -moz-linear-gradient(-45deg, #3a3d46 0%, #22252e 100%);
            background: -webkit-linear-gradient(-45deg, #3a3d46 0%, #22252e 100%);
            background: linear-gradient(135deg, #3a3d46 0%, #22252e 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fafafa', endColorstr='#cccccc', GradientType=1);
            position: relative;
            border-radius: 5px;
            width: 100%;
            height: 100%;
            padding: 20px;
        }

        div.paragraph p {
            color: #eee;
            white-space: normal;
            text-align: justify;
            font: .8em "IRSans", Helvetica, Arial, sans-serif;
            line-height: 30px;
            width: 100%;
            height: 100%;
        }

        div.paragraph .cubeAbs {
            position: absolute;
            left: -50px;
            top: 160px;
        }

        .cubeWrapper {
            width: 150px;
            height: 150px;
            position: relative;
            perspective: 1000px;
        }

        @keyframes cubeOutRotate {
            0% {
                transform: translateZ(-75px) rotateX(-20deg) rotateY(0deg);
            }

            100% {
                transform: translateZ(-75px) rotateX(-20deg) rotateY(360deg);
            }
        }

        div.cubeOut {
            width: 100%;
            height: 100%;
            position: absolute;
            transform-style: preserve-3d;
            animation: cubeOutRotate 4s linear infinite;
        }

        div.cubeOut figure {
            display: block;
            position: absolute;
            width: 148px;
            height: 148px;
            outline: 1px solid transparent;
            background: rgba(255, 255, 255, .1);
            line-height: 148px;
            font-size: 100px;
            font-weight: bold;
            color: rgba(255, 255, 255, .3);
            text-align: center;
        }

        div.cubeOut .front {
            transform: rotateY(0deg) translateZ(75px);
        }

        div.cubeOut .back {
            transform: rotateY(180deg) translateZ(75px);
        }

        div.cubeOut .right {
            transform: rotateY(90deg) translateZ(75px);
        }

        div.cubeOut .left {
            transform: rotateY(-90deg) translateZ(75px);
        }

        div.cubeOut .top {
            transform: rotateX(90deg) translateZ(75px);
        }

        div.cubeOut .bottom {
            transform: rotateX(-90deg) translateZ(75px);
        }

        @keyframes cubeInRotate {
            0% {
                transform: translateZ(-75px) translateX(-25px) translateY(25px) rotateX(-20deg) rotateY(0deg);
            }

            100% {
                transform: translateZ(-75px) translateX(-25px) translateY(25px) rotateX(-20deg) rotateY(360deg);
            }
        }

        div.cubeIn {
            width: 100px;
            height: 100px;
            position: absolute;
            transform-style: preserve-3d;
            animation: cubeInRotate 4s linear infinite;
        }

        div.cubeIn figure {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            display: block;
            position: absolute;
            width: 98px;
            height: 98px;
            outline: 1px solid transparent;
            line-height: 98px;
            font-size: 1em;
            font-weight: bold;
            color: #fafafa;
            text-align: center;
        }

        div.cubeIn .front {
            transform: rotateY(0deg) translateZ(50px);
        }

        div.cubeIn .back {
            transform: rotateY(180deg) translateZ(50px);
        }

        div.cubeIn .right {
            transform: rotateY(90deg) translateZ(50px);
        }

        div.cubeIn .left {
            transform: rotateY(-90deg) translateZ(50px);
        }

        div.cubeIn .top {
            transform: rotateX(90deg) translateZ(50px);
        }

        div.cubeIn .bottom {
            transform: rotateX(-90deg) translateZ(50px);
        }

        div.cubeIn .left {
            padding-top: 20px;
            line-height: 25px;
        }

        .web div.cubeIn>* {
            -webkit-transition: all linear .2s;
            transition: all linear .2s;
            background: rgba(3, 155, 229, 0.6);
        }

        .web div.cubeIn>*:hover {
            background: rgba(3, 155, 229, 0.9);
        }

        .soft div.cubeIn>* {
            -webkit-transition: all linear .2s;
            transition: all linear .2s;
            background: rgba(0, 151, 167, 0.6);
        }

        .soft div.cubeIn>*:hover {
            background: rgba(0, 151, 167, 0.9);
        }

        .hard div.cubeIn>* {
            -webkit-transition: all linear .2s;
            transition: all linear .2s;
            background: rgba(0, 96, 100, 0.6);
        }

        .hard div.cubeIn>*:hover {
            background: rgba(0, 96, 100, 0.9);
        }

        .social div.cubeIn>* {
            -webkit-transition: all linear .2s;
            transition: all linear .2s;
            background: rgba(0, 191, 165, 0.6);
        }

        .social div.cubeIn>*:hover {
            background: rgba(0, 191, 165, 0.9);
        }

        .bpm div.cubeIn>* {
            -webkit-transition: all linear .2s;
            transition: all linear .2s;
            background: rgba(105, 240, 174, 0.6);
        }

        .bpm div.cubeIn>*:hover {
            background: rgba(105, 240, 174, 0.9);
        }

        div.halfCircleWrapper {
            display: none;
        }

        @keyframes rotateCircle {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .pie,
        .abs {
            /* ... other styles ... */
            animation: rotateCircle 18s linear infinite;
            /* 2 seconds per rotation, infinite loop */
        }

        /* Styles for larger screens */
        @media (min-width: 768px) {
            .counterTitle {
                font-size: 1.2rem;
                position: absolute;
                top: 20px;
                left: 50%;
                transform: translateX(-50%);
                padding: 0 25px;
            }

            .counterIcon {
                font-size: 1.2rem;
                position: absolute;
                top: 100px;
                left: 50%;
                transform: translateX(-50%);
                padding: 0 25px;
            }

            .counterValue {
                font-size: 14pt;
                position: absolute;
                top: 70px;
                left: 50%;
                transform: translateX(-50%);
                padding: 0 25px;
            }

            /* Other styles for larger screens ... */
        }

        /* Styles for smaller screens (e.g., mobile) */
        @media (max-width: 767px) {
            section.sectionCounter div.circle {

                width: 300px;
                height: 300px;
                /* Adjust font sizes, spacing, etc. for smaller screens ... */
            }

            .pie {

                width: 280px;
                height: 280px;
                /* Adjust font sizes, spacing, etc. for smaller screens ... */
            }

            .counterTitle {
                font-size: 8pt;
                position: absolute;
                top: 7px;
                left: 50%;
                transform: translateX(-50%);
                padding: 0 25px;
            }

            .counterIcon {
                font-size: 1.2rem;
                position: absolute;
                top: 70px;
                left: 50%;
                transform: translateX(-50%);
                padding: 0 25px;
            }

            .counterValue {
                font-size: 10pt;
                position: absolute;
                top: 50px;
                left: 50%;
                transform: translateX(-50%);
                padding: 0 25px;
            }
        }
    </style>
    <style>
        .services-title {
            height: auto;
            background-image: url({{ asset($info->service_image) }});
            background-attachment: fixed !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        @media (max-width: 480px) {
            .services-title {
                height: auto;
                background-image: url({{ asset($info->service_image_mobile) }});
                background-attachment: fixed !important;
                background-repeat: no-repeat !important;
                background-size: 100% 100% !important;
            }
        }

        dfn {
            font-style: italic
        }

        mark {
            background-color: #ff0;
            color: #000
        }

        small {
            font-size: 80%
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        audio:not([controls]) {
            display: none;
            height: 0
        }

        img {
            border-style: none
        }



        [type=button]::-moz-focus-inner,
        [type=reset]::-moz-focus-inner,
        [type=submit]::-moz-focus-inner,
        button::-moz-focus-inner {
            border-style: none;
            padding: 0
        }

        [type=button]:-moz-focusring,
        [type=reset]:-moz-focusring,
        [type=submit]:-moz-focusring,
        button:-moz-focusring {
            outline: ButtonText dotted 1px
        }

        legend {
            box-sizing: border-box;
            color: inherit;
            display: table;
            max-width: 100%;
            padding: 0;
            white-space: normal
        }


        [type=checkbox],
        [type=radio] {
            box-sizing: border-box;
            padding: 0
        }

        [type=number]::-webkit-inner-spin-button,
        [type=number]::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        [type=search]::-webkit-search-cancel-button,
        [type=search]::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        summary {
            display: list-item
        }

        [hidden],
        template {
            display: none
        }

        /*# sourceMappingURL=normalize.min.css.map */
        .section-wrapper {
            width: 100%;
            height: 734px;
            overflow: hidden;
            position: relative;
            background-color: #f3f4fd;
        }

        .section-wrapper .container {
            position: relative;
            /* height: 100%; */
        }

        .section-wrapper .shielding-layer {
            content: "";
            width: 67%;
            height: 169%;
            position: absolute;
            top: -37%;
            right: -6%;
            z-index: 3;
            pointer-events: none;
            transform: rotate(16deg);
        }

        /* .section-wrapper .shielding-layer:after {
                                                                                                                                                    content: "";
                                                                                                                                                    width: 71%;
                                                                                                                                                    height: 100%;
                                                                                                                                                    position: absolute;
                                                                                                                                                    top: 0;
                                                                                                                                                    right: 0;
                                                                                                                                                    z-index: 3;
                                                                                                                                                    background: linear-gradient(90deg, rgba(249, 249, 254, 0) rgba(249, 249, 254, 0.97) 0,);
                                                                                                                                                }

                                                                                                                                                .section-wrapper .shielding-layer:before {
                                                                                                                                                    pointer-events: none;
                                                                                                                                                    content: "";
                                                                                                                                                    width: calc(29% + 1px);
                                                                                                                                                    height: 100%;
                                                                                                                                                    position: absolute;
                                                                                                                                                    top: 0;
                                                                                                                                                    left: 0;
                                                                                                                                                    z-index: 3;
                                                                                                                                                    background: linear-gradient(90deg, rgba(249, 249, 254, 0.97) 0, rgba(249, 249, 254, 0));
                                                                                                                                                } */

        .section-wrapper:before {
            content: "";
            width: 100%;
            height: 119px;
            pointer-events: none;
            background: linear-gradient(180deg, rgba(254, 254, 255, 0), #fff);
            bottom: 0;
            left: 0;
            position: absolute;
            z-index: 2;
        }

        .section-wrapper .box {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            height: 100%;
            z-index: 100;
        }

        .section-wrapper .content {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            width: 100%;
            /* max-width: 600px; */
            position: absolute;
            top: 0;
            right: 0;
            z-index: 4;
        }

        .section-wrapper .content .title {
            font-size: 32px;
            color: rgba(0, 0, 0, 0.8);
            line-height: 48px;
            text-align: left;
        }

        .section-wrapper .content .feature-list {
            margin: 18px 0 24px;
            font-size: 14px;
            color: rgba(0, 0, 0, 0.7);
            line-height: 20px;
        }



        .section-wrapper .template-wall {
            width: 100%;
            display: flex;
            align-items: flex-start;
            transform: rotate(16deg);
            text-align: right;
        }

        .section-wrapper .template-wall .column {
            display: flex;
            flex-direction: column;
            margin: 0 10px;
            transform-style: preserve-3d;
        }

        .section-wrapper .template-wall .column:nth-child(2n) {
            -webkit-animation: myimg-data-v-4d0e073a 15s linear infinite;
            animation: myimg-data-v-4d0e073a 15s linear infinite;
        }

        .section-wrapper .template-wall .column:nth-child(odd) {
            -webkit-animation: myimg-data-v-4d0e073a 30s linear infinite;
            animation: myimg-data-v-4d0e073a 30s linear infinite;
        }

        .section-wrapper .template-wall .column:hover {
            z-index: 100;
            -webkit-animation-play-state: paused;
            animation-play-state: paused;
        }

        .section-wrapper .wall-box {
            display: inline-block;
            position: relative;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .section-wrapper .wall-box .icon {
            width: 214px;
            margin: 25px 10px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .section-wrapper .wall-box .hoverable:hover {
            transform: scale(1.2);
        }


        @-webkit-keyframes myimg-data-v-4d0e073a {
            0% {
                transform: translateY(0);
            }

            to {
                transform: translateY(-50%);
            }
        }

        @keyframes myimg-data-v-4d0e073a {
            0% {
                transform: translateY(0);
            }

            to {
                transform: translateY(-50%);
            }
        }

        @media screen and (max-width: 992px) {
            .template-wall .column:hover {
                -webkit-animation-play-state: running !important;
                animation-play-state: running !important;
            }

            .shelter {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .home-template-wrapper {
                height: 744px;
                padding-bottom: 0;
            }

            .home-template-wrapper .shielding-layer {
                display: none;
            }

            .home-template-wrapper:after {
                position: absolute;
                width: 100%;
                height: 508px;
                top: 0;
                left: 0;
                content: "";
                background: linear-gradient(177deg, #f5f6ff, rgba(255, 255, 255, 0.95) 60%, rgba(252, 252, 252, 0));
                opacity: 0.95;
            }

            .home-template-wrapper:before {
                display: none;
            }

            .home-template-wrapper .box {
                height: auto;
            }

            .home-template-wrapper .content {
                width: 88%;
                height: auto;
                justify-content: flex-start;
                align-items: center;
                left: 50%;
                transform: translateX(-50%);
                margin-left: 0;
                max-width: -webkit-max-content;
                max-width: -moz-max-content;
                max-width: max-content;
            }

            .home-template-wrapper .content .title {
                margin-top: 44px;
                font-size: 24px;
                line-height: 34px;
                text-align: center;
            }

            .home-template-wrapper .content .feature-list {
                margin: 12px 0 20px;
                font-size: 14px;
                line-height: 22px;
                text-align: center;
            }

            .home-template-wrapper .content .btn {
                padding: 0 28px;
                box-sizing: border-box;
                font-size: 14px;
                margin-bottom: 181px;
                height: 48px;
                line-height: 48px;
            }

            .home-template-wrapper .template-wall {
                transform: rotate(16deg) translateX(-200px);
            }
        }

        @media screen and (min-width: 1366px) {
            .content {
                margin-left: calc(50% - 600px);
            }
        }
    </style>
    <style>
        .services-title {
            background-size: contain;
        }

        @media (max-width: 768px) {
            .single-post h3 {
                font-size: 1.45rem !important;
            }
        }

        .headsection {
            background: url("{{ asset('/') }}/home/img/travel.jpg");
            background-attachment: fixed;
            position: relative;
            background-repeat: no-repeat;
            opacity: 1;
            transition: opacity 0.5s, transform 0.5s;
            z-index: 1;
            background-size: cover;
        }

        .section1 {
            /* background-image: url('{{ asset('/') }}photos/home/icon.png'); */


            position: absolute;
            top: 20px;
            /* Adjust as needed */
            left: 20px;
            /* Adjust as needed */
            width: 200px;
            /* Adjust as needed */
            z-index: 1000;
            /* background-attachment: fixed; */


            /* Ensure the background stays behind the content */
            transition: opacity 0.5s;
        }

        .section2 {}

        .section3 {
            background: linear-gradient(rgba(255, 255, 255, .5), rgba(255, 255, 255, .5)), url("{{ asset('/') }}home/img/icons/airplane.png");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 1;
            transition: opacity 0.5s, transform 0.5s;
            z-index: 1;
            transition: opacity 0.5s;
            background-size: auto;
        }
    </style>

    <style>
        .counter_section {
            padding: 0;
            background-image: url({{ asset($info->counter_image) }});
            color: #E2E2E2;
            overflow: hidden;
            padding-top: 10rem;
            padding-bottom: 8rem;
            margin-bottom: 1rem;
            background-size: 100% 100% !important;
            background-repeat: no-repeat;
        }

        @media (max-width: 480px) {
            .counter_section {
                background-image: url({{ asset($info->counter_image_mobile) }});

                background-size: 100% 100% !important;
                background-repeat: no-repeat;
                box-shadow: inset 0px -8px 8px #fff, inset 0px 10px 5px #fff !important;
            }

        }


        .counter_section_item svg {
            width: 45px !important;
            height: 45px !important;
        }

        .item i {

            font-size: 3em;
        }

        .item p.number {
            font-size: 1.5em;
        }

        .item p.label {
            font-size: 1.1em;
            text-transform: uppercase;
        }

        .item:hover i,
        .item:hover p {
            color: rgb(226, 226, 226);
        }

        @media (max-width: 786px) {
            .counter .item {
                flex: 0 0 50%;
            }
        }


        .headsection {
            background: url("{{ $homeSlider->where('type', '1')->first()->image }}");
            background-attachment: fixed;
            position: relative;
            background-repeat: no-repeat;
            opacity: 1;
            transition: opacity 0.5s, transform 0.5s;
            z-index: 1;
            background-size: cover;
        }

        @media (max-width:480px) {
            .headsection {
                background: url("{{ $homeSlider->where('type', '2')->first()->image }}");
                background-attachment: fixed;
                position: relative;
                background-repeat: no-repeat;
                background-size: 100% 100% !important;
            }
        }
    </style>
    <style>
        .owl-carousel .owl-item img {
            max-width: unset;
        }

        #customers-testimonials.owl-carousel .owl-dots .owl-dot span {
            background: #DF1F26 !important;
            margin-bottom: 25px !important;
        }

        .shadow-effect {
            background: #fff;
            padding: 20px;
            border-radius: 4px;
            text-align: center;
            border: 1px solid #ECECEC;
            box-shadow: 0 19px 38px rgba(0, 0, 0, 0.10), 0 15px 12px rgba(0, 0, 0, 0.02);
        }

        #customers-testimonials .shadow-effect p {
            font-family: inherit;
            font-size: 17px;
            line-height: 1.5;
            margin: 0 0 17px 0;
            font-weight: 300;
            direction: rtl;
        }

        .testimonial-name {
            margin: -17px auto 0;
            display: table;
            width: auto;
            background: #3190E7;
            padding: 9px 35px;
            border-radius: 12px;
            text-align: center;
            color: #fff;
            box-shadow: 0 9px 18px rgba(0, 0, 0, 0.12), 0 5px 7px rgba(0, 0, 0, 0.05);
        }

        #customers-testimonials .item {
            text-align: center;
            padding: 50px;
            margin-bottom: 80px;
            opacity: .2;
            transform: scale3d(0.8, 0.8, 1);
            transition: all 0.3s ease-in-out;
        }

        #customers-testimonials .owl-item.active.center .item {
            opacity: 1;
            transform: scale3d(1.0, 1.0, 1);
        }

        .owl-carousel .owl-item img {
            transform-style: preserve-3d;
            /* max-width: 90px; */
            margin: 0 auto 17px;
            /* max-height: 155px; */
        }

        /*
                    .owl-carousel .owl-stage {
                        display: flex;
                    }

                    .owl-carousel .owl-stage .item {
                        display: flex;
                        flex: 1 0 auto;
                        height: 100%;
                    }

                    .owl-carousel .owl-stage .single-post {
                position: relative;
                overflow: hidden;
                /* margin-bottom: 80px; */
        /*This is optional*/
        display: flex;
        flex-direction: column;
        align-items: stretch;
        }

        */ #customers-testimonials.owl-carousel .owl-dots .owl-dot.active span,
        #customers-testimonials.owl-carousel .owl-dots .owl-dot:hover span {
            background: #3190E7;
            transform: translate3d(0px, -50%, 0px) scale(0.7);
        }

        #customers-testimonials.owl-carousel .owl-dots {
            display: inline-block;
            width: 100%;
            text-align: center;
        }

        #customers-testimonials.owl-carousel .owl-dots .owl-dot {
            display: inline-block;
        }

        #customers-testimonials.owl-carousel .owl-dots .owl-dot span {
            background: #3190E7;
            display: inline-block;
            height: 20px;
            margin: 0 2px 5px;
            transform: translate3d(0px, -50%, 0px) scale(0.3);
            transform-origin: 50% 50% 0;
            transition: all 250ms ease-out 0s;
            width: 20px;
        }

        .owl-carousel .owl-stage {
            display: flex;
        }

        .article-items {
            display: flex;
            flex: 1 0 auto;
            height: 100%;
        }

        .aticle-box {
            position: relative;
            overflow: hidden;
            /* margin-bottom: 80px; */
            /*This is optional*/
            display: flex;
            flex-direction: column;
            align-items: stretch;
            padding-bottom: 0;
        }
    </style>

    <style>
        .tm-accordion .card:first-child {
            /* border-radius: 15px 15px 0 0; */
        }

        .tm-accordion .card {

            margin-bottom: 15px;
        }

        .tm-accordion .card .card-header {
            background-color: #fff;
            border-top: none;
        }

        .tm-accordion .card .card-header .title {
            padding: 1rem 2rem;
            margin: 0;
            position: relative;
        }

        .tm-accordion .card .card-header .title .accordion-controls-icon {
            opacity: 0.4;
            position: absolute;
            left: 20px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            transition: all 0.4s ease-in-out;
        }
    </style>
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function($) {

            "use strict";
            $('#customers-testimonials').owlCarousel({
                loop: true,
                center: true,
                items: 3,
                margin: 0,
                autoplay: true,
                dots: true,
                autoplayTimeout: 2500,
                smartSpeed: 450,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1170: {
                        items: 3
                    }
                }
            });


        });
    </script>


    <script>
        var lastScrollTop = 0;

        window.addEventListener("scroll", function() {
            var currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            var img = document.getElementById('section3');
            if (currentScroll > lastScrollTop) {

                img.style.backgroundImage =
                    "url({{ asset('/home/img/icons/airplane.png') }})";
            } else {
                img.style.backgroundImage =
                    "url({{ asset('/home/img/icons/airplane2.png') }})";

            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        }, false);
    </script>


    <script defer>
        $('.counter').countUp({
            triggerOnce: true
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#accordion100').on('shown.bs.collapse', function(e) {
                $(e.target).prev().find('.open-icon').hide();
                $(e.target).prev().find('.close-icon').show();
            }).on('hidden.bs.collapse', function(e) {
                $(e.target).prev().find('.open-icon').show();
                $(e.target).prev().find('.close-icon').hide();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#accordion100').on('shown.bs.collapse', function(e) {
                var target = $(e.target); // Get the target section
                var offset = target.prev().height(); // Calculate offset based on previous section's height
                $('html, body').animate({
                    scrollTop: target.offset().top - offset - 90
                }, 500); // Animate scrolling with duration (adjust as needed)
            });
        });
    </script>

@endsection
@section('content')

    <div class="section-wrapper headsection" id="headsection">
        <div class="shielding-layer"></div>
        <div class="">
            <div class="content">
                <div id="particles_js"></div>
                <div class="container">
                    <div class=" row align-items-center" style="">
                        <div class="col-lg-7">
                            <!-- Banner content -->
                            <div class="banner-content">
                                <div id="typed-strings">
                                    <p>{{ $info->title }}</p>
                                </div>

                                <h1 class="typed"></h1>

                                <div id="typed-strings2">
                                    <p>{{ $info->description }}</p>
                                </div>
                                <h2 data-animate="fadeInUp" data-delay="1.3" class=""><span
                                        class="typed-second"></span>
                                </h2>

                                {{-- <ul class="list-inline" data-animate="fadeInUp" data-delay="1.4">
                                    <li><a href="{{ route('about') }}" class="btn btn-secondary"
                                            style="padding: 10px 25px !important; margin-top: 25px !important;">@lang('site.about_me')</a>
                                    </li>
                                    <li><a href="#ServicesSection" class="btn btn-secondary"
                                            style="padding: 10px 25px !important; margin-top: 25px !important;">خدماتنا</a>
                                    </li>

                                </ul> --}}

                            </div>
                        </div>
                        {{-- <div class="col-lg-2 offset-lg-3 homeAirplains" style="" data-animate="fadeInUp"
                            data-delay="1.4">>
                            <div class="template-wall">
                                <div class="column index-0">
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/1.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/2.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/3.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/4.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/5.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/11.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/7.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/8.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                    <div class="wall-box">
                                        <img alt="perfectcod" class="icon hoverable" src="{{ asset('home/icon/9.png') }}"
                                            style="width: 75px; height: 92px; margin-right: 5px;">
                                        <div class="shelter"></div>
                                    </div>
                                </div>



                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Banner -->

    <!-- about us -->
    <section class="pb-5-5 ">
        {{-- <div style="background: #E2E2E2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="  margin-bottom: -15px;">
                <path fill="#fff" fill-opacity="1"
                    d="M0,192L34.3,208C68.6,224,137,256,206,250.7C274.3,245,343,203,411,192C480,181,549,203,617,192C685.7,181,754,139,823,138.7C891.4,139,960,181,1029,170.7C1097.1,160,1166,96,1234,74.7C1302.9,53,1371,75,1406,85.3L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                </path>
            </svg>

        </div> --}}
        <div class="container">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 text-left" data-animate="fadeInUp" data-delay=".3">
                        <h2 class="heading-title mt-3 text-center"
                            style="font-size: 2.5rem;
                        color: #DF1F26;">نبذة عن المحترف</h2>
                        <hr class="line line-hr-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2 pt-2" data-animate="fadeInUp" data-delay=".5">
                        <div class="about-p">{!! $about->about_me !!}</div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End of about us -->

    {{-- Start Counter --}}
    <section class="counter_section" data-animate="fadeInUp" data-delay=".6">
        {{-- <div style="background: #fff">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="  margin-bottom: -15px;">
                <path fill="#E2E2E2" fill-opacity="1"
                    d="M0,192L34.3,208C68.6,224,137,256,206,250.7C274.3,245,343,203,411,192C480,181,549,203,617,192C685.7,181,754,139,823,138.7C891.4,139,960,181,1029,170.7C1097.1,160,1166,96,1234,74.7C1302.9,53,1371,75,1406,85.3L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                </path>
            </svg>

        </div> --}}
        <section class="container sectionCounter">
            <div class="circleWrapper">
                <div class="circle" data-animate="fadeInUp" data-delay=".8">
                    <ul class='pie'>
                        @php
                            $current_angle = 0;
                            $total_slices = count($counters);
                            $angle_increment = 360 / $total_slices;
                        @endphp

                        @foreach ($counters as $counter)
                            <li class='slice' style='--slice-angle: {{ $current_angle }}deg;'>
                                <div class='slice-contents' data-tab="{{ $loop->index + 1 }}"
                                    data-ang="{{ $current_angle }}" style='--slice-angle: {{ $current_angle }}deg;'>
                                    <div class="counterDiv">

                                        <p class="counterTitle">{{ $counter->title }}</p>
                                    </div>
                                    <div class="counterIcon">
                                        <i class="fa {{ $counter->icon }} " aria-hidden="true"></i>
                                    </div>
                                    <p id="number1" class="number counter counterValue">
                                        {{ $counter->value }}</p>
                                </div>
                            </li>
                            @php
                                $current_angle += $angle_increment;
                            @endphp
                        @endforeach
                    </ul>
                </div>
            </div>
            </div>


        </section>
    </section>

    <!-- Features -->
    <section class="pt-7 pb-2 section2">
        <div class="container">

            <div class="container-fluid">
                <div class="row">
                    <h2 class="" data-animate="fadeIn Up" data-delay=".1"
                        style="margin: 0 auto 75px; text-align: center;">امتيازات تجعل
                        شركة المحترف الأفضل على الإطلاق </h2>
                </div>
                <div class="row">

                    @foreach ($aboutFields as $aboutField)
                        <div class="col-md-4">
                            <div class="single-feature text-center" data-animate="fadeInUp" data-delay=".1">
                                <i class="fa {{ $aboutField->icon }}" style="font-size: 3rem; color:#DF1F26;"></i>
                                <h3>{{ $aboutField->title }}</h3>
                                <p style="text-align: justify;">{{ $aboutField->value }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- End of Features -->

    <!-- Our services -->
    <section class="" id="ServicesSection">
        <div class="services-title position-relative pt-7" style="" dir="ltr">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <!-- Section title -->
                        <div class="section-title text-center">
                            <h2 class="text-white" data-animate="fadeInUp" data-delay=".1">خدمات المحترف </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="customers-testimonials" class="owl-carousel " data-animate="fadeInUp" data-delay="1.5">

                            @foreach ($services as $index => $service)
                                <!--TESTIMONIAL 1 -->
                                <div class="item article-items">
                                    <div class="shadow-effect aticle-box">
                                        <div class="single-post" data-animate="" style="padding: 0">
                                            <div class="image-hover-wrap">
                                                <img class="img-fluid" src="{{ asset($service->image) }}" alt=""
                                                    style="" loading="lazy">
                                                <div
                                                    class="image-hover-content d-flex justify-content-center align-items-center text-center">
                                                    <ul class="list-inline">
                                                        <li><a href="{{ route('service', $service->slug) }}"><i
                                                                    class="fas fa-link"></i></a>
                                                        </li>
                                                        {{-- <li><a href="#"><i class="fas fa-share-alt"></i></a></li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                            <div style="padding: 15px">
                                                <h3>{{ $service->title }}</h3>
                                                <h4>
                                                    {!! $service->intro !!}
                                                </h4>
                                            </div>

                                        </div>
                                        <div class="testimonial-name"
                                            style="background-color: #DF1F26;position: absolute;
                                        bottom: 25px;left: 50%; transform: translateX(-50%);">
                                            <a href="{{ route('service', $service->slug) }}"
                                                class="btn btn-secondary">@lang('site.read_more')<i
                                                    class="fas fa-caret-right"></i></a>
                                        </div>
                                    </div>


                                </div>
                                <!--END OF TESTIMONIAL 1 -->
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- <!-- Service contact info -->
                <div class="roboto text-center font-weight-medium" data-animate="fadeInUp" data-delay=".65">
                    <p>If you have any questions in your mind, Just <a href="contact.html">click here</a> to write or you
                        can <br>Call to <a href="tel:1234567890">(+1) 234-567-890</a></p>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End of Our services -->

    <!-- Servers -->
    <section id="section3" class="servers pt-7 bg-light section3 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title">
                        <h2 data-animate="fadeInUp" data-delay=".1">الاستشارات المجانية</h2>
                        <p data-animate="fadeInUp" data-delay=".2">وحتى نبقى مستشاركم الأول منذ اللحظة الأولى
                            نقدم لكم خدمة الاستشارات المجانية التي تحصلون من خلالها على إجابات كاملة لأسئلتكم واستفساراتكم
                            عن كل ما يتعلق بالسفر والدراسة بالخارج</p>
                        <span data-animate="fadeInUp" data-delay=".2"><a class="btn btn-secondary"
                                href="{{ route('contact') }}">أحجز موعدك الآن</a></li>
                        </span>
                        <div class="col-md-12">
                            <p data-animate="fadeInUp" data-delay="1.5">
                            <h2 style="margin-bottom: 25px"><i class="fa fa-map-marker-alt"
                                    style="font-size: 30px; margin-left: 15px"></i>أفرع شركة المحترف:</h2>
                            <div id="accordion100" class="tm-accordion">
                                @foreach ($locations as $index => $location)
                                    <div class="card" {{-- data-animate="fadeInUp" data-delay="{{ 0.1 + $index / 8 }}" --}}>
                                        <div class="card-header p-0" id="heading10{{ $index + 1 }}">
                                            <h5 class="title" data-toggle="collapse"
                                                data-target="#collapse10{{ $index + 1 }}"
                                                aria-expanded="@if ($index == 0) true
                                                        @else
                                                        false @endif"
                                                aria-controls="collapse10{{ $index + 1 }}">
                                                {{ $index + 1 }} - {{ $location->name }}
                                                <i class="fas fa-chevron-down accordion-controls-icon open-icon"
                                                    @if ($index == 0) style="display: none" @endif></i>
                                                <i class="fas fa-chevron-up accordion-controls-icon close-icon"
                                                    @if ($index != 0) style="display: none" @endif
                                                    aria-hidden="true"></i>

                                            </h5>
                                        </div>
                                        <div id="collapse10{{ $index + 1 }}"
                                            class="collapse @if ($index == 0) show @endif"
                                            aria-labelledby="heading10{{ $index + 1 }}" data-parent="#accordion100">
                                            <div class="card-body">
                                                {!! $location->description !!}</div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            </p>
                        </div>
                    </div>


                </div>
                <div class="col-lg-5 offset-lg-2 d-none d-lg-block">
                    <div class="server-map">
                        <img src="{{ asset('home/img/servers.png') }}" alt="" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
        {{-- <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="  margin-bottom: -15px;">
                <path fill="#fff" fill-opacity="1"
                    d="M0,192L34.3,208C68.6,224,137,256,206,250.7C274.3,245,343,203,411,192C480,181,549,203,617,192C685.7,181,754,139,823,138.7C891.4,139,960,181,1029,170.7C1097.1,160,1166,96,1234,74.7C1302.9,53,1371,75,1406,85.3L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                </path>
            </svg>

        </div> --}}
    </section>
    <!-- End Servers -->

    {{-- who --}}
    <section class="pt-2 pb-7 bg-light who_we">
        <a data-animate="fadeInUp" data-delay=".1" href="{{ route('about') }}"
            class="btn btn-secondary">@lang('site.about_me')</a>

    </section>
    {{-- end who --}}


    <!-- Reviews -->
    <section class="pt-2 pb-7 bg-gradient" style="padding-bottom: 200px !important">
        <div class="container">
            <div class="section-title text-center">
                <h2 data-animate="fadeInUp" data-delay=".1">أراء العملاء</h2>
            </div>
            <div class="swiper-container review-slider">
                <div class="swiper-wrapper">
                    @foreach ($reviews as $review)
                        <div class="swiper-slide single-review-slide">
                            <!-- Author info -->
                            <div class="d-flex align-items-center author-info-wrap">
                                <img class="img-thumbnail mr-3" src="{{ asset($review->image) }}" alt=""
                                    data-animate="fadeInUp" data-delay=".1" style="max-width: 100px;aspect-ratio: 3/3;">
                                <div class="author-info">
                                    {{ $review->name }}
                                </div>
                            </div>
                            <p>{!! $review->description !!}</p>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="swiper-pagination review-pagination position-static"></div>
        </div>
    </section>
    <!-- End of Reviews -->
@endsection
