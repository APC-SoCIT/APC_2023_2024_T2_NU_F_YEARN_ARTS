<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/about.css">
<link rel="stylesheet" href="assets/css/typing.css">
<link rel="stylesheet" href="assets/css/chatbot.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

<title>Yearn Art | About Us</title>
<link rel="icon" href="assets/image/Yearn.jpg" type="image/png">

</head>
<body>
@include('home.header')

  <div class="content">
    <div class="yearnpic">
        <img src="assets/image/Yearn.jpg" alt="Logo">
    </div>
    <div class="about-yearn">
        <h1>ABOUT US</h1>
        <p>Yearn Art, owned by Alfretz Marcelino, is a newly established crochet company in the Philippines. Despite the    pandemic's challenges, Mrs. Marcelino decided to pursue her passion for crochet by founding Yearn Art in 2021. With her creativity and determination, she has transformed her hobby into a promising business venture. Yearn Art specializes in creating one-of-a-kind and intricate crochet designs that are functional as well as artistic.
        </p> 
            <br>
            <br>
        <p>
        Their products, which range from a baby costume set to women's beachwear and handmade bags, highlight the beauty and versatility of the craft. Mrs. Marcelino is committed to providing high-quality products and exceptional customer service, and she has amassed a devoted following among crochet enthusiasts in the Philippines. Mrs. Marcelino remains committed to preserving the rich history and tradition of crochet in the Philippines as Yearn Art grows and expands its reach. She hopes to inspire others to discover the beauty and artistry of this beloved craft through her business.
        </p>
            <br>
            <br>
        <p>    
        Yearn Arts is a thriving business that operates in the creative industry, specializing in the production and sale of artistic products. With a passion for artistry and a commitment to delivering high-quality products, Yearn Arts has established a strong reputation for its unique and visually captivating creations. The company takes pride in its diverse range of artwork, encompassing various mediums such as paintings, sculptures, and digital art.
        </p>
    </div>
    <div class="contact-us">
        <h1>CONTACT US</h1>

        <p><img src="assets/image/location.png"> 48 Lot 8, Marang St, Amparo Subd., Brgy 179, Caloocan City, MM</p>
        <br>
        <p><img src="assets/image/phone.png">0948 298 9479</p>
        <br>
        <p><img src="assets/image/mail.png"><a href="mailto:yearnart21@gmail.com">yearnart21@gmail.com</a></p>
    </div>
  </div> 



<script src="assets/javascript/home.js"></script>

<div class="chatbot">
    <div class="chatbox">
        <div class="chatbox__support">
            <div class="chatbox__header">
                <div class="chatbox__content--header">
                    <h4 class="chatbox__heading--header">YearnBot</h4>
                </div>
            </div>
            <div class="chatbox__messages">
                <div>
                    <div class="messages__item messages__item--visitor">
                        Can you let me talk to the support?
                    </div>
                    <div class="messages__item messages__item--operator">
                        Sure!
                    </div>
                    <div class="messages__item messages__item--visitor">
                        Need your help, I need a developer in my site.
                    </div>
                    <div class="messages__item messages__item--operator">
                        Hi... What is it? I'm a front-end developer, yay!
                    </div>
                    <div class="messages__item messages__item--typing">
                        <span class="messages__dot"></span>
                        <span class="messages__dot"></span>
                        <span class="messages__dot"></span>
                    </div>
                </div>
            </div>
            <div class="chatbox__footer">
                <div class="file">
                    <img src="file.png" alt="file">
                </div>
                <input type="text" placeholder="Write a message...">
                <div class="icon">
                    <img src="./send.png" alt="Send">
                </div>
            </div>
        </div>
        <div class="chatbox__button">
            <button>button</button>
        </div>
    </div>
</div>
<script src="assets/javascript/Chat.js"></script>
<script src="assets/javascript/app.js"></script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="script.js"></script>


  <script>
    const menuLinks = document.querySelectorAll('.menu-link');
    
    menuLinks.forEach(link => {
      link.addEventListener('click', () => {
        menuLinks.forEach(otherLink => otherLink.classList.remove('active-link'));
        link.classList.add('active-link');
      });
    });
  </script>
</body>
</html>

