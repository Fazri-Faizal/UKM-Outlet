
<!-- <?php 
    include('header.php');
    include('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Mockup</title>
    <link rel="stylesheet" href="/css/chat.css">
</head>
<body>
  <div class="container">
    <div class="row" style="display: flex">
      <section class="discussions">
        <div class="discussion search">
          <div class="searchbar">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="text" placeholder="Search..."></input>
          </div>
        </div>
        <div class="discussion message-active">
          <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
            <div class="online"></div>
          </div>
          <div class="desc-contact">
            <p class="name">Megan Leib</p>
            <p class="message">9 pm at the bar if possible 😳</p>
          </div>
          <div class="timer">12 sec</div>
        </div>

        <div class="discussion">
          <div class="photo" style="background-image: url(https://i.pinimg.com/originals/a9/26/52/a926525d966c9479c18d3b4f8e64b434.jpg);">
            <div class="online"></div>
          </div>
          <div class="desc-contact">
            <p class="name">Dave Corlew</p>
            <p class="message">Let's meet for a coffee or something today ?</p>
          </div>
          <div class="timer">3 min</div>
        </div>

        <div class="discussion">
          <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1497551060073-4c5ab6435f12?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=667&q=80);">
          </div>
          <div class="desc-contact">
            <p class="name">Jerome Seiber</p>
            <p class="message">I've sent you the annual report</p>
          </div>
          <div class="timer">42 min</div>
        </div>

        <div class="discussion">
          <div class="photo" style="background-image: url(https://card.thomasdaubenton.com/img/photo.jpg);">
            <div class="online"></div>
          </div>
          <div class="desc-contact">
            <p class="name">Thomas Dbtn</p>
            <p class="message">See you tomorrow ! 🙂</p>
          </div>
          <div class="timer">2 hour</div>
        </div>

        <div class="discussion">
          <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1553514029-1318c9127859?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80);">
          </div>
          <div class="desc-contact">
            <p class="name">Elsie Amador</p>
            <p class="message">What the f**k is going on ?</p>
          </div>
          <div class="timer">1 day</div>
        </div>

        <div class="discussion">
          <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1541747157478-3222166cf342?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=967&q=80);">
          </div>
          <div class="desc-contact">
            <p class="name">Billy Southard</p>
            <p class="message">Ahahah 😂</p>
          </div>
          <div class="timer">4 days</div>
        </div>

        <div class="discussion">
          <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1435348773030-a1d74f568bc2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80);">
            <div class="online"></div>
          </div>
          <div class="desc-contact">
            <p class="name">Paul Walker</p>
            <p class="message">You can't see me</p>
          </div>
          <div class="timer">1 week</div>
        </div>
      </section>
      <section class="chat">
        <div class="header-chat">
          <i class="icon fa fa-user-o" aria-hidden="true"></i>
          <p class="name">Megan Leib</p>
          <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>
        </div>
        <div class="messages-chat">
          <div class="message">
            <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
              <div class="online"></div>
            </div>
            <p class="text"> Hi, how are you ? </p>
          </div>
          <div class="message text-only">
            <p class="text"> What are you doing tonight ? Want to go take a drink ?</p>
          </div>
          <p class="time"> 14h58</p>
          <div class="message text-only">
            <div class="response">
              <p class="text"> Hey Megan ! It's been a while 😃</p>
            </div>
          </div>
          <div class="message text-only">
            <div class="response">
              <p class="text"> When can we meet ?</p>
            </div>
          </div>
          <p class="response-time time"> 15h04</p>
          <div class="message">
            <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
              <div class="online"></div>
            </div>
            <p class="text"> 9 pm at the bar if possible 😳</p>
          </div>
          <p class="time"> 15h09</p>
        </div>
        <div class="footer-chat">
          <i class="icon fa fa-smile-o clickable" style="font-size:25pt;" aria-hidden="true"></i>
          <input type="text" class="write-message" placeholder="Type your message here"></input> -->
          <!-- <i class="icon send fa fa-paper-plane-o clickable" aria-hidden="true"></i> -->
        <!-- </div>
      </section>
    </div>
  </div>
</body>
</html> -->

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Mockup</title>
    <link rel="stylesheet" href="/css/chat.css">
</head>
<body>
  <div class="chat-box">
    <div class="chat-header">
      <div class="user-profile active" data-up='cont1'></div>
      <span>Erza</span>
      <div class="user-profile" data-up='cont2'></div>
      <span>Nastu</span>
      <div class="user-profile" data-up='cont3'></div>
      <span>Lucy</span>
      <div class="user-profile" data-up='cont4'></div>
      <span>Goku?</span>
    </div>

    <div id='chat' class="chat">
      <div class="chat-container active" id='cont1'>
        <div class="bubble">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut sapien vitae eros consectetur vehicula lacinia at nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum aliquet elit nec erat rutrum rutrum. Mauris ligula
            magna, dignissim id tortor eu, aliquet dapibus ipsum</p>
        </div>
        <span class="datestamp">May 20, 2016, 4:16 PM</span>
        <div class="bubble bubble-alt">
          <p>Aenean ac magna rutrum, finibus est at, venenatis ipsum. Etiam egestas venenatis semper. Sed a neque sed sem lacinia finibus ac nec nisi.</p>
        </div>
        <span class="datestamp  dt-alt">May 20, 2016, 4:17 PM</span>
        <div class="bubble">
          <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut facilisis justo in nisl elementum, at fermentum augue tempor. </p>
        </div>
        <div class="bubble">
          <p>Aliquam feugiat tortor ac massa commodo convallis sit amet ultricies urna. Sed pharetra augue ac sapien varius, at vulputate velit pretium.</p>
        </div>
        <span class="datestamp">May 20, 2016, 4:20 PM</span>
        <div class="bubble bubble-alt">
          <p>Quisque sit amet nulla nibh. Mauris eu lacus sed orci rhoncus cursus nec et enim. Phasellus finibus luctus mi ac sodales. Integer efficitur gravida mauris in eleifend. Maecenas ac interdum mi.</p>
        </div>
        <span class="datestamp  dt-alt">May 20, 2016, 4:22 PM</span>
      </div>

      <div class="chat-container" id='cont2'>
        <div class="bubble">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut sapien vitae eros consectetur vehicula lacinia at nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum aliquet elit nec erat rutrum rutrum. Mauris ligula
            magna, dignissim id tortor eu, aliquet dapibus ipsum</p>
        </div>
        <span class="datestamp">May 20, 2016, 4:16 PM</span>

        <div class="bubble bubble-alt">
          <p>Aenean ac magna rutrum, finibus est at, venenatis ipsum. Etiam egestas venenatis semper. Sed a neque sed sem lacinia finibus ac nec nisi.</p>
        </div>
        <span class="datestamp  dt-alt">May 20, 2016, 4:17 PM</span>

        <div class="bubble">
          <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut facilisis justo in nisl elementum, at fermentum augue tempor. </p>
        </div>

        <div class="bubble">
          <p>Aliquam feugiat tortor ac massa commodo convallis sit amet ultricies urna. Sed pharetra augue ac sapien varius, at vulputate velit pretium.</p>
        </div>
        <span class="datestamp">May 20, 2016, 4:20 PM</span>

        <div class="bubble bubble-alt">
          <p>Quisque sit amet nulla nibh. Mauris eu lacus sed orci rhoncus cursus nec et enim. Phasellus finibus luctus mi ac sodales. Integer efficitur gravida mauris in eleifend. Maecenas ac interdum mi.</p>
        </div>
        <span class="datestamp  dt-alt">May 20, 2016, 4:22 PM</span>
      </div>

      <div class="chat-container" id='cont3'>
        <div class="bubble">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut sapien vitae eros consectetur vehicula lacinia at nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum aliquet elit nec erat rutrum rutrum. Mauris ligula
            magna, dignissim id tortor eu, aliquet dapibus ipsum</p>
        </div>
        <span class="datestamp">May 20, 2016, 4:16 PM</span>

        <div class="bubble bubble-alt">
          <p>Aenean ac magna rutrum, finibus est at, venenatis ipsum. Etiam egestas venenatis semper. Sed a neque sed sem lacinia finibus ac nec nisi.</p>
        </div>
        <span class="datestamp  dt-alt">May 20, 2016, 4:17 PM</span>

        <div class="bubble">
          <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut facilisis justo in nisl elementum, at fermentum augue tempor. </p>
        </div>

        <div class="bubble">
          <p>Aliquam feugiat tortor ac massa commodo convallis sit amet ultricies urna. Sed pharetra augue ac sapien varius, at vulputate velit pretium.</p>
        </div>
        <span class="datestamp">May 20, 2016, 4:20 PM</span>

        <div class="bubble bubble-alt">
          <p>Quisque sit amet nulla nibh. Mauris eu lacus sed orci rhoncus cursus nec et enim. Phasellus finibus luctus mi ac sodales. Integer efficitur gravida mauris in eleifend. Maecenas ac interdum mi.</p>
        </div>
        <span class="datestamp  dt-alt">May 20, 2016, 4:22 PM</span>
      </div>

      <div class="chat-container" id='cont4'>
        <div class="bubble">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ut sapien vitae eros consectetur vehicula lacinia at nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum aliquet elit nec erat rutrum rutrum. Mauris ligula
            magna, dignissim id tortor eu, aliquet dapibus ipsum</p>
        </div>
        <span class="datestamp">May 20, 2016, 4:16 PM</span>


        <div class="bubble bubble-alt">
          <p>Aenean ac magna rutrum, finibus est at, venenatis ipsum. Etiam egestas venenatis semper. Sed a neque sed sem lacinia finibus ac nec nisi.</p>
        </div>
        <span class="datestamp  dt-alt">May 20, 2016, 4:17 PM</span>


        <div class="bubble">
          <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut facilisis justo in nisl elementum, at fermentum augue tempor. </p>
        </div>

        <div class="bubble">
          <p>Aliquam feugiat tortor ac massa commodo convallis sit amet ultricies urna. Sed pharetra augue ac sapien varius, at vulputate velit pretium.</p>
        </div>
        <span class="datestamp">May 20, 2016, 4:20 PM</span>

        <div class="bubble bubble-alt">
          <p>Quisque sit amet nulla nibh. Mauris eu lacus sed orci rhoncus cursus nec et enim. Phasellus finibus luctus mi ac sodales. Integer efficitur gravida mauris in eleifend. Maecenas ac interdum mi.</p>
        </div>
        <span class="datestamp  dt-alt">May 20, 2016, 4:22 PM</span>
      </div>
    </div>
    <div class="chat-control">
      <input class="chat-input" type="text" placeholder="enter your message" />
      <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16" style="color: aliceblue;margin-left: 8px;margin-bottom: -5px;">
      <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
      </svg>
    </div>
  </div>
</body>
<script type="text/javascript" src="/js/chat.js"></script>
</html>
