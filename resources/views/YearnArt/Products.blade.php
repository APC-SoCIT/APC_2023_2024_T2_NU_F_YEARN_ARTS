<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/products.css">
<link rel="stylesheet" href="assets/css/typing.css">
<link rel="stylesheet" href="assets/css/chatbot.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

<title>Yearn Art | Products</title>
<link rel="icon" href="assets/image/Yearn.jpg" type="image/png">

</head>
<body>
@include('home.header')



   <div class="main-container">
      <div class="title-header">
         <h2>
            Our products
         </h2>
      </div>
      <div class="product-container">
         <section class="product_section">
               <div class="container-box">
                  @foreach($products as $products)
                  <div class="col-sm-6 col-md-4 col-lg-3">
                     <div class="box">
                        <div class="option_container">
                           <div class="options">
                              <a href="{{url('product_details',$products->id)}}" class="option1">
                              Product Details
                              </a>
                           </div>
                        </div>

                        <div class="img-box">
                           <img src="product/{{$products->image}}" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                           {{$products->product_name}}
                           </h5>
                           <h6>
                           ₱{{ number_format($products->medium_price, 2)}}
                           </h6>
                        </div>

                  </div>

               </div>
                  @endforeach
         </section>
      </div>
   </div>

@include ('YearnArt.chatbot')
@include ('YearnArt.script')
</body>
</html>
