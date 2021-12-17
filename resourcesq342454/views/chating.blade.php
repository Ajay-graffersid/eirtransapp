@extends('masterlayout')
 
@section('title')
 Chating
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
    
    
     <div id="mainContent">
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Chating</h4>
            <div class="row">
              <div class="col-md-12">
                    @if(Session::get('msg'))
         <div class = "alert alert-success">
            <ul>
             <li> {{Session::get('msg')}}</li>
            </ul>
         </div>
               @endif

                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    
                    <div class="col-md-8">
            <h2>Messages</h2>

            <div
                class="clearfix"
                v-for="message in messages"
            >
                @{{ message.user.name }}: @{{ message.message }}
            </div>

            <div class="input-group">
                <input
                    type="text"
                    name="message"
                    class="form-control"
                    placeholder="Type your message here..."
                    v-model="newMessage"
                    @keyup.enter="sendMessage"
                >

                <button
                    class="btn btn-primary"
                    @click="sendMessage"
                >
                    Send
                </button>
            </div>
        </div>
                 
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
 
 
 

@endsection