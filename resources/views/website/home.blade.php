@extends('website.layout.app')
@section('title', 'Home')
@section('content')
<style>
    body{
        background: url(/slide1.jpg) !important;
   
    }
    .textcolor{
        color: blue !important;
        text-shadow: none;
    }
    .authorcolor{
        font-size: 22px;
        color: yellow;
    }
    h1,section a, blockquote{
        color: blue !important;
    }
    .navbar-section a{
      color: blue !important;
    }
    blockquote{
        border-left: .2rem solid blue;
    }
</style>
  <div class="container grid-lg"></div><br>
    <link rel="stylesheet" media="screen" href="/front/css/home.css">
    <h1 class="textcolor"><a href="{{route('front.kitaab')}}" class="textcolor">Enter - LIBRARY</a></h1>
 
  <blockquote class="container column col-10">
      <p class="textcolor"> <b>
      “A piece of knowledge, unlike a piece of physical property, can be shared by large groups of people without making anybody poorer.”</b></br>
      <cite class="authorcolor">― Aaron Swartz</cite>
      <i style='font-size: 22px;'>,The Boy Who Could Change the World: The Writings of Aaron Swartz</i> 
      </p>
</blockquote>
<blockquote class="container column col-10 sindhi" style='border-right: .2rem solid blue;border-left:none;'>
      <p class="textcolor"><b>"ڄــــاڻ، ڪنهن طبعي ملڪيت جي ٽڪري جي ابتڙ سڀني سان ڪنهن کي به غريب ڪرڻ بنا ونڊي سگھجي ٿي۔ "</b><cite class="authorcolor"> -ايرون سوارٽز</cite></p>
</blockquote>
<blockquote class="container column col-10">     
      <p class="textcolor"><b>“Information is power. But like all power, there are those who want to keep it for themselves.” </b><cite class="authorcolor">― Aaron Swartz</cite></p>
  </blockquote>
  <blockquote class="container column col-10 sindhi" style='border-right: .2rem solid blue;border-left:none;'>
  <p class="textcolor"><b>"
      عــلــم طاقت آهي۔ پر هر اقتدار وانگر ڪي ٽولا ان کي رڳو پاڻ تائين محدود رکڻ چاهن ٿا۔ "
      </b><cite class="authorcolor">― ايرون سوارٽز</cite></p>
</blockquote>
  <div class="welcome"></div>
@endsection