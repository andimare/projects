<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- link rel="stylesheet" href="style.css " -->
    <style>
        @font-face {
            font-family: 'MyFont';
            src: url('myfont.woff2') format('woff2'),
            url('myfont.woff') format('woff');
        }
        
        body {
            font-family: 'MyFont', sans-serif;
            background-color: rgb(235, 213, 18);
        }

        .banner{
            position: relative;
            width: 100%;
            /* height: 70vh; */
            overflow: hidden;
        }

        .slider .slide{
            position: absolute;
            width: 100%;
            height: 100%;
            /* display: flex; */
        }

        .slide img{
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
            opacity: 0;
            transition: .3s ease;
        }

        .slide.active img{
            opacity: 1;
        }

        .info{
            position: absolute;
            width: 50%;
            height: 100%;
        }

        .left{
            top: 0;
            left: 0;
            transform: translateX(-100%);
            transition: .0s;
        }


        .active .left{
            transform: translateX(0);
            z-index: 1;
            transition: .5s ease-in-out;
        }

        .right{
            top: 0;
            right: 0;
            transform: translateX(100%);
            transition: 0s;
        }

        .active .right{
            transform: translateX(0);
            z-index: 1;
            transition: .5s ease-in-out;
        }

        .left .penetrate-blur{
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, .1);
            backdrop-filter: blur(20px);
            display: flex;
            justify-content: end;
            align-items: center;
            -webkit-mask: linear-gradient(#020 0 0),
            linear-gradient(#020 0 0);
            -webkit-mask-clip: text, padding-box;
            -webkit-mask-composite:xor;
        }

        .right .penetrate-blur{
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: start;
            align-items: center;
        }

        .penetrate-blur h1{
            /*font-size: 150px;*/
            padding-right: 10px;
        }

        .penetrate-blur h3{
            position: absolute;
            font-size: 40px;
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            transform: translateY(190%);
            margin-left: 15px;
        }

        .left-h{
            text-shadow: 0 0 10px rgba(255, 255, 255, .8);
        }

        .right-h{
            color: #fff;
            text-shadow:
                0 1px 0 #ccc,
                0 2px 0 #c9c9c9,
                0 3px 0 #bbb,
                0 4px 0 #b9b9b9,
                0 5px 0 #aaa,
                0 6px 1px rgba(0, 0, 0, .1),
                0 0px 5px rgba(0, 0, 0, .1),
                0 1px 3px rgba(0, 0, 0, .3),
                0 3px 5px rgba(0, 0, 0, .2),
                0 5px 10px rgba(0, 0, 0, .25),
                0 10px 10px rgba(0, 0, 0, .2),
                0 20px 20px rgba(0, 0, 0, .15);
        }

        .left .content{
            position: absolute;
            margin-left: 10px;
            margin-bottom: 10px;
            padding-left: 20px;
            padding-right: 5px;
            bottom: 2%;
            left: 10px;
            color: #fff;
        }

        .content h3{
            font-size: 16px;
        }

        .content p{
            font-size: .75em;
            margin: 10px 0 5px;
        }

        .content .btn{
            display: inline-block;
            padding: 5px 10px;
            background: #fff;
            border: 1px solid #fff;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            font-size: .75em;
            color: rgb(0, 0, 0);
            text-decoration: none;
            font-weight: 600;
            transition: .5s;
        }

        .content .btn:hover {
            background: transparent;
            color: #fff;
        }

        .navigation{
            position: absolute;
            bottom: 2%;
            right: 4%;
            z-index: 99;
        }

        .navigation span {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            background: #fff;
            border: 2px solid white;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .5);
            margin-left: 25px;
        }

        .navigation span:nth-child(1){
            background: transparent;
        }

        .navigation span:nth-child(1):hover{
            background: #fff;
        }

        .navigation span i{
            font-size: 45px;
            /* color: #444; */
            transition: .5s;
        }


        .navigation span:nth-child(1) i{
            color: #fff;

        }

        .navigation span:nth-child(1):hover i{
            color: #444;
        }
        /* 
        .box{
            border: 1px solid black;
            width:300px;
            height: 300px;
            position: relative;
        }

        .box1{
            width: 200px;
            height: 200px;
            border: 1px solid green;
        }

        .abs{
            position: absolute;
            border:1px solid red;
            width: 50px;
            height: 50px;
        } 

        .right-box{

            left: 80%;
        }*/
    </style>
    <title>Document</title>
</head>
<body>
    <header class="fixed top-0 left-0 h-16 w-full bg-white opacity-50 z-20">
        <div class="flex justify-between absolute bottom-0 w-full">
            <div class="icon h-16">
                <img class="h-full object-cover" src="IRES-logo.webp" alt="">
            </div>
            <div class="menu flex justify-end items-end text-black">
                <div class="back mx-5">
                    <a href="http://">back</a>
                </div>
                <div class="search mx-5">
                    <a href="http://">search</a>
                </div>
            </div>
        </div>
    </header>
    <div class="banner relative w-full h-[80vw] md:h-[50vw] overflow-hidden">
        <div class="slider">
            <div class="slide absolute w-full h-full active">
                <img class="absolute w-full objective-cover pointer-events-none opacity-0" src="Zhangjiajie-National-Forest-Park.jpg" alt="">
                <div class="left info">
                    <div class="penetrate-blur">
                        <h1 class="left-h text-[80px] sm:text-[90px] md:text-[130px] lg:text-[150px]">Chi</h1>
                    </div>
                    <div class="content">
                        <h3 class="hidden">01. China Forest For</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur 
                        </p>
                        <a href="http://#" class="btn">More Details</a>
                    </div>
                </div>
                <div class="right info">
                    <div class="penetrate-blur">
                        <h1 class="right-h  text-[80px] sm:text-[90px] md:text-[130px] lg:text-[150px]">na</h1>
                        <h3 class="hidden">Forest</h3>
                    </div>
                </div>
            </div>

            <div class="slide">
                <img src="pexels-eberhard-grossgasteiger-1612353.jpg" alt="">
                <div class="left info">
                    <div class="penetrate-blur">
                        <h1 class="left-h  text-[80px] sm:text-[90px] md:text-[130px] lg:text-[150px]">Jap</h1>
                    </div>
                    <div class="content">
                        <h3 class="hidden">02. Japan Forest For</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur 
                        </p>
                        <a href="http://#" class="btn">More Details</a>
                    </div>
                </div>
                <div class="right info">
                    <div class="penetrate-blur">
                        <h1 class="right-h  text-[80px] sm:text-[90px] md:text-[130px] lg:text-[150px]">an</h1>
                        <h3 class="hidden">Forest</h3>
                    </div>
                </div>
            </div>
            
            <div class="slide">
                <img src="pexels-david-besh-884788.jpg" alt="">
                <div class="left info">
                    <div class="penetrate-blur">
                        <h1 class="left-h  text-[80px] sm:text-[90px] md:text-[130px] lg:text-[150px]">Afr</h1>
                    </div>
                    <div class="content">
                        <h3 class="hidden">03. africa Forest For</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur 
                        </p>
                        <a href="http://#" class="btn">More Details</a>
                    </div>
                </div>
                <div class="right info">
                    <div class="penetrate-blur">
                        <h1 class="right-h  text-[80px] sm:text-[90px] md:text-[130px] lg:text-[150px]">ica</h1>
                        <h3 class="hidden">Forest</h3>
                    </div>
                </div>
            </div>
            
            <div class="slide">
                <img src="pexels-quang-nguyen-vinh-2131614.jpg" alt="">
                <div class="left info">
                    <div class="penetrate-blur">
                        <h1 class="left-h  text-[80px] sm:text-[90px] md:text-[130px] lg:text-[150px]">Bra</h1>
                    </div>
                    <div class="content">
                        <h3 class="hidden">04. Brazil Forest For</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur 
                        </p>
                        <a href="http://#" class="btn">More Details</a>
                    </div>
                </div>
                <div class="right info">
                    <div class="penetrate-blur">
                        <h1 class="right-h  text-[80px] sm:text-[90px] md:text-[130px] lg:text-[150px]">zil</h1>
                        <h3>Forest</h3>
                    </div>
                </div>
            </div>
            
            <div class="slide">
                <img src="pexels-quintin-gellar-313782.jpg" alt="">
                <div class="left info">
                    <div class="penetrate-blur">
                        <h1 class="left-h  text-[80px] sm:text-[90px] md:text-[130px] lg:text-[150px]">Ser</h1>
                    </div>
                    <div class="content">
                        <h3 class="hidden">05. Serbia Forest Tour</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur 
                        </p>
                        <a href="http://#" class="btn">More Details</a>
                    </div>
                </div>
                <div class="right info">
                    <div class="penetrate-blur">
                        <h1 class="right-h  text-[80px] sm:text-[90px] md:text-[130px] lg:text-[150px]">bia</h1>
                        <h3 class="hidden">Forest</h3>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="navigation hidden lg:block">
            <span class="prev-btn">
                <i>
                    <svg xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 24 24' fill='#000000' width='24' height='24'><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
                </i>
            </span>
            <span class="next-btn" id="nxt">
                <i>
                    <svg xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 24 24' fill='#000000' width='24' height='24'><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>
                </i>
            </span>
        </div>
    </div>
    <div class=" mx-auto w-full md:w-4/5 py-5 bg-gray-100">
        <div class="filter flex justify-around py-1 bg-blue-300">
            <div class="button border border-white rounded-md py-1 px-4">filter 1</div>
            <div class="button border border-white rounded-md py-1 px-4">filter 2</div>
            <div class="button border border-white rounded-md py-1 px-4">filter 3</div>
            <div class="button border border-white rounded-md py-1 px-4">filter 4</div>
            <div class="button border border-white rounded-md py-1 px-4">filter 5</div>
        </div>
        <div class="box  my-24 w-full lg:w-max mx-auto">
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -left-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-ml-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 left-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -right-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-mr-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 right-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -left-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-ml-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 left-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -right-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-mr-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 right-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -left-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-ml-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 left-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -right-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-mr-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 right-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -left-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-ml-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 left-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -right-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-mr-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 right-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -left-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-ml-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 left-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -right-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-mr-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 right-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -left-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-ml-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 left-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -right-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-mr-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 right-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -left-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-ml-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 left-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -right-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-mr-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 right-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -left-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-ml-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 left-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -right-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-mr-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 right-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -left-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-ml-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 left-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -right-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-mr-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 right-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -left-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-ml-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 left-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="my-2 lg:my-20 relative">
                <div class="w-24 h-24 -top-10 -right-1/3 absolute rounded-3xl overflow-hidden lg:block hidden ">
                    <img class="h-full object-cover" src="What-is-famine-drought.original.webp" alt="">
                </div>
                <div class="left-box w-full lg:w-[400px] lg:h-[350px] lg:-mr-20 lg:rounded-3xl overflow-hidden ">
                    <img class="h-full object-cover" src="original.img.webp" alt="">
                </div>
                <div class="right-box text-wrap w-full lg:w-[300px] lg:h-[300px] lg:rounded-xl overflow-hidden lg:absolute top-5 right-[80%]">
                    <p class="p-8 bg-blue-200 ">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore facere accusantium enim ducimus voluptates, corrupti, reprehenderit corporis qui velit asperiores eum. Exercitationem ab distinctio voluptatem harum incidunt obcaecati, similique accusantium.
                    </p>
                </div>
            </div>
            <div class="absolute w-5"></div>
        </div>
    </div>
    <script>
        const nextBtn = document.querySelector('.next-btn')
        const prevBtn = document.querySelector('.prev-btn')
        const slides = document.querySelectorAll('.slide')
        const numberOfSlides = slides.length;
        let slideNumber = 0;

        //Slider next button
        nextBtn.addEventListener('click',() => {
            slides.forEach((slide) => {
                slide.classList.remove('active')
            })

            slideNumber++

            if(slideNumber > (numberOfSlides - 1)){
                slideNumber = 0
            }

            slides[slideNumber].classList.add('active')

            console.log('hello')
        })

        //Slider previous button
        prevBtn.addEventListener('click',() => {
            slides.forEach((slide) => {
                slide.classList.remove('active')
            })
            
            slideNumber--

            if(slideNumber < 0){
                slideNumber = numberOfSlides - 1
            }

            slides[slideNumber].classList.add('active')

            console.log('hello there')
        })

        function slidez(){
            
            slides.forEach((slide) => {
                slide.classList.remove('active')
            })

            slideNumber++

            if(slideNumber > (numberOfSlides - 1)){
                slideNumber = 0
            }

            slides[slideNumber].classList.add('active')

            console.log('hello World')
        }

        setInterval(slidez, 3000)
    </script>
</body>
</html>