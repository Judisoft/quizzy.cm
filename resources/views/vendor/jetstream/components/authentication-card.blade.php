
<style>
    @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Pacifico&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=DynaPuff:wght@300&family=Josefin+Sans:wght@700&family=Libre+Baskerville:wght@700&family=Pacifico&family=Rowdies:wght@300&display=swap');
    .logo{
      font-family: 'Libre Baskerville', serif;
      height: 45px;
      width: 45px; 
      padding: 2px;
      background-color: #4267B2;
      color:#fff;
      font-size: 28px;
      border-radius: 5px;
        
    }
    a{
      font-family: 'Rowdies', sans-serif;
      color: #4267B2;
      font-size: 26px;
    }
  </style>
  
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden">
        {{ $slot }}
    </div>
</div>
