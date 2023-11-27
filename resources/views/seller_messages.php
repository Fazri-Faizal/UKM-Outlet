<head>
  <style>
     /* Webpixels CSS */
    /* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
    /* URL: https://github.com/webpixels/css */

    @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

    /* Bootstrap Icons */
    @import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");

  .container {
      padding:0;
      background-color: #FFF; 
      box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
      /* height: 700px; */
    }
  
  /* === CONVERSATIONS === */
  .discussions {
    width: 30%;
    height: 850px;
    box-shadow: 0px 8px 10px rgba(0,0,0,0.20);
    overflow: hidden;
    /* background-color: #804444; */
    display: inline-block;
    border-right: 2px solid #EEEEEE;
  }
  
  .discussions .discussion {
    width: 100%;
    height: 90px;
    background-color: #FAFAFA;
    border-bottom: solid 1px #E0E0E0;
    display:flex;
    align-items: center;
    cursor: pointer;
  }
  
  .discussions .search {
    display:flex;
    align-items: center;
    justify-content: center;
    color: #E0E0E0;
  }
  
  .discussions .search .searchbar {
    height: 40px;
    background-color: #FFF;
    width: 70%;
    padding: 0 20px;
    border-radius: 50px;
    border: 1px solid #EEEEEE;
    display:flex;
    align-items: center;
    cursor: pointer;
    box-shadow: 0px 3px 2px rgba(0,0,0,0.100);
  }
  
  .discussions .search .searchbar input {
    margin-left: 15px;
    height:38px;
    width:100%;
    border:none;
    font-family: 'Montserrat', sans-serif;;
  }
  
  .discussions .search .searchbar *::-webkit-input-placeholder {
      color: #E0E0E0;
  }
  .discussions .search .searchbar input *:-moz-placeholder {
      color: #E0E0E0;
  }
  .discussions .search .searchbar input *::-moz-placeholder {
      color: #E0E0E0;
  }
  .discussions .search .searchbar input *:-ms-input-placeholder {
      color: #E0E0E0;
  }
  
  .discussions .message-active {
    width: 98.5%;
    height: 90px;
    background-color: #FFF;
    border-bottom: solid 1px ##804444;
  }
  
  .discussions .discussion .photo {
      margin-left:20px;
      display: block;
      width: 45px;
      height: 45px;
      background: #E6E7ED;
      -moz-border-radius: 50px;
      -webkit-border-radius: 50px;
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
  }
  
  .online {
    position: relative;
    top: 30px;
    left: 35px;
    width: 13px;
    height: 13px;
    background-color: #8BC34A;
    border-radius: 13px;
    border: 3px solid #FAFAFA;
  }
  
  .desc-contact {
    height: 43px;
    width:50%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  
  .discussions .discussion .name {
    margin: 0 0 0 20px;
    font-family:'Montserrat', sans-serif;
    font-size: 11pt;
    color:#804444;
  }
  
  .discussions .discussion .message {
    margin: 6px 0 0 20px;
    font-family:'Montserrat', sans-serif;
    font-size: 9pt;
    color:#515151;
  }
  
  .timer {
    margin-left: 15%;
    font-family:'Open Sans', sans-serif;
    font-size: 11px;
    padding: 3px 8px;
    color: #BBB;
    background-color: #FFF;
    border: 1px solid #E5E5E5;
    border-radius: 15px;
  }
  
  .chat {
    float: inline-end;
    background: #FAFAFA;
    height: 843px;
    width: 70%;
  }
  
  .header-chat {
    background-color: #FAFAFA;
    height: 89px;
    box-shadow: 0px 3px 2px rgba(0,0,0,0.100);
    display:flex;
    align-items: center;
  }
  
  .chat .header-chat .icon {
    margin-left: 30px;
    color:#515151;
    font-size: 14pt;
  }
  
  .chat .header-chat .name {
    margin: 0 0 0 20px;
    text-transform: uppercase;
    font-family:'Montserrat', sans-serif;
    font-size: 13pt;
    color:#515151;
  }
  
  .chat .header-chat .right {
    position: absolute;
    right: 40px;
  }
  
  .chat .messages-chat {
    padding: 25px 35px;
  }
  
  .chat .messages-chat .message {
    display:flex;
    align-items: center;
    margin-bottom: 8px;
  }
  
  .chat .messages-chat .message .photo {
      display: block;
      width: 45px;
      height: 45px;
      background: #E6E7ED;
      -moz-border-radius: 50px;
      -webkit-border-radius: 50px;
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
  }
  
  .chat .messages-chat .text {
    margin: 0 35px;
    background-color: #7a6e6e40;
    padding: 15px;
    border-radius: 37px;
  }
  
  .text-only {
    margin-left: 45px;
  }
  
  .time {
    font-size: 10px;
    color:lightgrey;
    margin-bottom:10px;
    margin-left: 85px;
  }
  
  .response-time {
    float: right;
    margin-right: 40px !important;
  }
  
  .response {
    float: right;
    margin-right: 0px !important;
    margin-left:auto; /* flexbox alignment rule */
  }
  
  .response .text {
    background-color: #a7b8cdeb !important;
  }
  
  .footer-chat {
    width: 60%;
    height: 60px;
    display: flex;
    align-items: center;
    position: absolute;
    /* bottom: -9px; */
    /* background-color: transparent; */
    background-color: #FAFAFA;
    top: 91%;
    /* border-top: 2px solid #EEE;   */
  }
  
  .chat .footer-chat .icon {
    margin-left: 30px;
    color:#814444;
    font-size: 20pt;
  }
  
  .chat .footer-chat .send {
    color:#fff;
    background-color: #804444;
    position: absolute;
    right: 50px;
    padding: 12px 12px 12px 12px;
    border-radius: 50px;
    font-size: 14pt;
  }
  
  .chat .footer-chat .name {
    margin: 0 0 0 20px;
    text-transform: uppercase;
    font-family:'Montserrat', sans-serif;
    font-size: 13pt;
    color:#515151;
  }
  
  .chat .footer-chat .right {
    position: absolute;
    right: 40px;
  }
  
  .write-message {
    border: none !important;
    width: 85%;
    height: 50px;
    margin-left: 20px;
    padding: 10px;
    background: transparent;
    color: #814444;
    font-size: 13pt;
  }
  
  .footer-chat *::-webkit-input-placeholder {
    color: #814444;
    font-size: 13pt;
  }
  .footer-chat input *:-moz-placeholder {
    color: #C0C0C0;
    font-size: 13pt;
  }
  .footer-chat input *::-moz-placeholder {
    color: #C0C0C0;
    font-size: 13pt;
    margin-left:5px;
  }
  .footer-chat input *:-ms-input-placeholder {
    color: #C0C0C0;
    font-size: 13pt;
  }
  
  .clickable {
    cursor: pointer;
  }

  .row-chat {
    --x-gutter-x: 1.5rem;
    --x-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(var(--x-gutter-y)*-1);
  }
  </style>
</head>

<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="seller_dashboard">
                <img src="img/UKM OMELET LOGO 4.png"  height="73" alt="...">
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <?php 
                include('seller_sidebar.php');

                ?>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Header -->
        <header class="bg-surface-primary border-bottom pt-6">
            <div class="container-fluid">
                <div class="mb-npx">
                    <div class="row align-items-center">
                        <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                            <!-- Title -->
                            <h1 class="h2 mb-0 ls-tight">Messages</h1>
                        </div>
                        <!-- Actions -->
                        <!-- <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span>Edit</span>
                                </a>
                                <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Create</span>
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </header>

        <!-- Main -->
        <main>
          <div class="row-chat">      
            <section class="discussions">
              <div class="discussion search">
                <div class="searchbar">
                  <i class="fa fa-search"></i>
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
                <p class="name">Megan Leib</p>
                <!-- <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i> -->
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
                <i class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5"/>
                  </svg>
                </i>
                <input type="text" class="write-message" placeholder="Type your message here"></input>
                <i class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                  </svg>
                </i>
              </div>
            </section>
          </div>
        </main>
    </div>
</div>