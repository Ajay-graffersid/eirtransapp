<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <title>Sign In</title>
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
.peersa {
    width: 100%;
    min-height: 100vh;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 15px;
    background-image: url(https://eirtrans.ie/wp-content/uploads/2018/08/vehicle-transport-ireland-uk-2.jpg)!important;
        background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
} 
.bgc-whita{
    background-color: #ffffffed!important;
    box-shadow: 0px 4px 16px 0px #7d7979;
    border: 1px solid #eae6e6;
    border-radius: 14px;
}
.prateek{
      font-weight: bold !important;
    font-size: 32px;
    text-align: center;
    
}

.btn_new{
        width: 100%!important;
    border-radius: 50px;
    font-size: 17px;
    font-weight: 800;
    
}

.btn {
    border-radius: 5px!important;
    font-size: 17px!important;
    font-weight: 600!important;
    letter-spacing: 1px!important;
}

.form-control {
    padding: 12px!important;
    margin-top: 14px!important;
    background: #f4f7fa61!important;
    border: 1px solid #8c240252!important;
    color: #000!important;
}
  </style>
  <link href="{!! asset('/assets/style.css') !!}" rel="stylesheet">
</head>



<body class="app" id="output-text">
    
    
    
  <div id="loader">
    <div class="spinner"></div>
  </div>
  <script type="text/javascript">window.addEventListener('load', () => {
      const loader = document.getElementById('loader');
      setTimeout(() => {
        loader.classList.add('fadeOut');
      }, 300);
    });</script>

      
<!--    <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv"
      style="background-image:url(assets/static/images/bg.jpg)">
      <div class="pos-a centerXY">
        <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px"><img class="pos-a centerXY"
            src="assets/static/images/logo.png" alt=""></div>
      </div>
    </div>
    -->
  
      <div class="container-login100 peersa ai-s fxw-nw h-100v2h ">
    <div class="col-12 col-md-4 peer pX-40 pY-40 mT-80 h-100 bgc-whita scrollable pos-r" style="min-width:320px">
        
          @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
      
        @if(isset($msg_error))
         <div class = "alert alert-danger">
            <ul>
              
                  <li>{{$msg_error}}</li>
              
            </ul>
         </div>
      @endif
      
        @if(Session::get('msg'))
         <div class = "alert alert-success">
            <ul>
              
              
              
             <li> {{Session::get('msg')}}</li>
              
            </ul>
         </div>
      @endif
      
       @if(Session::get('msg_error'))
         <div class = "alert alert-danger">
            <ul>
              
              
              
             <li> {{Session::get('msg_error')}}</li>
              
            </ul>
         </div>
      @endif
      
                  
      <h4 class="fw-300 c-grey-900 mB-20 prateek" style="font-weight: bold !important;">Welcome</h4>
      <div class="logo" style="text-align:center !important;     margin: 0 auto;">
                        <img src="https://eirtransapp.com/assets/static/images/logoadmin.png" alt="" style="width: 100%;">
                        </div>
      
      <form method='post' action="{!! asset('/logtoadmin') !!}">
           <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <div class="form-group">
        <input type="email"
            class="form-control" placeholder="Email" name="email"></div>
            
        <div class="form-group">

        <input type="password"
            class="form-control" placeholder="Password" name="password"></div>
        <div class="form-group">
          <div class="peers ai-c jc-sb fxw-nw">
          
            <div class="peer btn_new"><button class="btn btn-primary w-100 mT-10">Login</button></div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="{!! asset('/assets/vendor.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('/assets/bundle.js') !!}"></script>

  
   <script> 
        var changeFontStyle = function (font) { 
            document.getElementById( 
                "output-text").style.fontFamily 
                        = font.value; 
        } 
    </script> 

</body>


</html>