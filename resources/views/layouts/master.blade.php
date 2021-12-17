<!DOCTYPE html>
<html>


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


 <link href="{!! asset('assets/lib/main.css') !!}" rel="stylesheet">
<!-- <script type="text/javascript" src="{!! asset('assets/lib/main.js') !!}"></script> -->

<head>
  <title>@yield('title')</title>
  <style>
    #loader {
      transition: all .3s ease-in-out;
      opacity: 1;
      visibility: visible;
      position: fixed;
      height: 100vh;
      width: 100%;
      background: #fff;
      z-index: 90000
    }

    #loader.fadeOut {
      opacity: 0;
      visibility: hidden
    }

    .spinner {
      width: 40px;
      height: 40px;
      position: absolute;
      top: calc(50% - 20px);
      left: calc(50% - 20px);
      background-color: #333;
      border-radius: 100%;
      -webkit-animation: sk-scaleout 1s infinite ease-in-out;
      animation: sk-scaleout 1s infinite ease-in-out
    }

    @-webkit-keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0)
      }

      100% {
        -webkit-transform: scale(1);
        opacity: 0
      }
    }

    @keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0);
        transform: scale(0)
      }

      100% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 0
      }
    }
  </style>
  <link href="{!! asset('assets/style.css') !!}" rel="stylesheet">
</head>

<body class="app">
  <div id="loader">
    <div class="spinner"></div>
  </div>
  <script type="text/javascript">window.addEventListener('load', () => {
      const loader = document.getElementById('loader');
      setTimeout(() => {
        loader.classList.add('fadeOut');
      }, 300);
    });</script>
  <div>
      @include('layouts/header')
    <div class="page-container">
       
        
           

      @include('layouts/header_nav') 
       
       @yield('content')
   
   @include('layouts/footer')
    
    </div>
  </div>
  <script type="text/javascript" src="{!! asset('assets/vendor.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('assets/bundle.js') !!}"></script>

  
  
  <script type="text/javascript" src="{!! asset('assets/jquery.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('assets/jquery-ui.js') !!}"></script>
  
  <script src="{!! asset('/assets/jquery.validate.min.js') !!}"></script>
    <script src="{!! asset('/assets/additional-methods.js') !!}"></script>
 
  
  
  
 
      
  
  
</body>


</html>