{{-- <a href="/">
    <svg class="w-16 h-16" viewbox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5"/>
        <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5"/>
    </svg>
</a> --}}

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
  
<div class="flex justify-center">
  <button class="logo">Q</button>
  <a href="{{ route('home') }}" class="px-2">Quizzy</a>
</div>