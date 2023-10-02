@include('client.layout.header')

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Detail Berita</div>
        <div class="right">
            <a href="javascript:;" class="headerButton">
                <ion-icon name="bookmark-outline"></ion-icon>
            </a>
            <a href={{ url()->previous() }} class="headerButton" data-toggle="modal" data-target="#actionSheetShare">
                <ion-icon name="share-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="blog-post">
            <div class="mb-2">
                <img src={{ asset('assets_client/img/sample/photo/wide1.jpg') }} alt="image" class="imaged square w-100">
            </div>
            <h1 class="title">How to take Landscape Photos in 10 Easy Ways</h1>
            <div class="post-header">
                <div>
                    <a href="#">
                        <img src={{ asset('assets_client/img/sample/avatar/avatar1.jpg') }} alt="avatar" class="imaged w24 rounded mr-05">
                        Alex Edwards
                    </a>
                </div>
                Jun 11, 2020
            </div>
            <div class="post-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at magna porttitor lorem mollis
                    ornare. Fusce varius varius massa. Vivamus nec odio tempus, condimentum ex eget, varius diam.
                </p>
                <p>
                    Ut id fermentum nisi. In hac habitasse platea dictumst. Praesent ornare eget neque ut cursus. Nunc
                    efficitur laoreet vulputate. Curabitur mi ligula, aliquet commodo leo in, consectetur venenatis
                    tellus. Maecenas quis vehicula erat, vitae finibus tellus.
                </p>
                <p>
                    Cras rhoncus ipsum quis lacus aliquam, quis euismod ligula varius. Phasellus ac odio rhoncus,
                    aliquet nisl lobortis, commodo orci. Quisque bibendum est ut pellentesque hendrerit.
                </p>
                <img src={{ asset('assets_client/img/sample/photo/wide2.jpg') }} alt="image">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at magna porttitor lorem mollis
                    ornare. Fusce varius varius massa. Vivamus nec odio tempus, condimentum ex eget, varius diam.
                </p>
                <h2>Heading</h2>
                <p>
                    Ut id fermentum nisi. In hac habitasse platea dictumst. Praesent ornare eget neque ut cursus. Nunc
                    efficitur laoreet vulputate. Curabitur mi ligula, aliquet commodo leo in, consectetur venenatis
                    tellus. Maecenas quis vehicula erat, vitae finibus tellus.
                </p>
                <h4>Subtitle</h4>
                <p>
                    Cras rhoncus ipsum quis lacus aliquam, quis euismod ligula varius. Phasellus ac odio rhoncus,
                    aliquet nisl lobortis, commodo orci. Quisque bibendum est ut pellentesque hendrerit.
                </p>
                <h4>Subtitle</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at magna porttitor lorem mollis
                    ornare. Fusce varius varius massa. Vivamus nec odio tempus, condimentum ex eget, varius diam.
                </p>
            </div>
        </div>
        <div class="section mt-4">
            <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal"
                data-target="#actionSheetShare">
                <ion-icon name="share-outline"></ion-icon>
                Share This Post
            </button>
        </div>
        <div class="divider mt-4 mb-3"></div>
        <div class="section">
            <div class="section-title mb-1">
                <h3 class="mb-0">Comments (3)</h3>
            </div>
            <div class="pt-2 pb-2">
                <!-- comment block -->
                <div class="comment-block">
                    <!--item -->
                    <div class="item">
                        <div class="avatar">
                            <img src={{ asset('assets_client/img/sample/avatar/avatar1.jpg') }} alt="avatar" class="imaged w32 rounded">
                        </div>
                        <div class="in">
                            <div class="comment-header">
                                <h4 class="title">Diego Morata</h4>
                                <span class="time">just now</span>
                            </div>
                            <div class="text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="comment-footer">
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="heart-outline"></ion-icon>
                                    Like (523)
                                </a>
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                    Reply
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- * item -->
                    <!--item -->
                    <div class="item">
                        <div class="avatar">
                            <img src={{ asset('assets_client/img/sample/avatar/avatar3.jpg') }} alt="avatar" class="imaged w32 rounded">
                        </div>
                        <div class="in">
                            <div class="comment-header">
                                <h4 class="title">Henry Itondo</h4>
                                <span class="time">05:50 PM</span>
                            </div>
                            <div class="text">
                                Sed laoreet leo eget maximus ultricies.
                            </div>
                            <div class="comment-footer">
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="heart" class="text-danger"></ion-icon>
                                    Like (4)
                                </a>
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                    Reply
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- * item -->
                    <!--item -->
                    <div class="item">
                        <div class="avatar">
                            <img src={{ asset('assets_client/img/sample/avatar/avatar4.jpg') }} alt="avatar" class="imaged w32 rounded">
                        </div>
                        <div class="in">
                            <div class="comment-header">
                                <h4 class="title">Carmelita Marsham</h4>
                                <span class="time">Sep 23, 2020</span>
                            </div>
                            <div class="text">
                                Vivamus lobortis, orci et commodo pulvinar, eros nibh volutpat ipsum, in rhoncus risus
                                dolor.
                            </div>
                            <div class="comment-footer">
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="heart-outline"></ion-icon>
                                    Like (5)
                                </a>
                                <a href="javascript:;" class="comment-button">
                                    <ion-icon name="chatbubble-outline"></ion-icon>
                                    Reply
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- * item -->
                </div>
                <!-- * comment block -->
            </div>
        </div>
        <div class="divider mt-2 mb-3"></div>
        <div class="section mt-2">
            <h3 class="mb-0">Send a Comment</h3>
            <div class="pt-2 pb-2">
                <form>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" id="name5" placeholder="Name">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" id="email5" placeholder="Email">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <textarea id="comment" rows="4" class="form-control" placeholder="Comment"></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="mt-1">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->

    <!-- Share Action Sheet -->
    <div class="modal fade action-sheet inset" id="actionSheetShare" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Share with</h5>
                </div>
                <div class="modal-body">
                    <ul class="action-button-list">
                        <li>
                            <a href="#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-facebook"></ion-icon>
                                    Facebook
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-twitter"></ion-icon>
                                    Twitter
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-instagram"></ion-icon>
                                    Instagram
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-list" data-dismiss="modal">
                                <span>
                                    <ion-icon name="logo-linkedin"></ion-icon>
                                    Linkedin
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- * Share Action Sheet -->

    <!-- App Bottom Menu -->
    @include('client.layout.bottom_navbar')
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    {{-- @include('client.layout.sidebar') --}}
    <!-- * App Sidebar -->

    {{-- Footer --}}
    @include('client.layout.footer')

</body>

</html>
