<div class="shadow-sm rounded bg-white mb-4">
    <article id="post-51"
        class="post-51 video type-video status-publish has-post-thumbnail hentry categories-gaming video_tag-exercitation video_tag-featured video_tag-game video_tag-star-wars video_tag-trailer pmpro-has-access">
        <div class="post-body single-body">
            <div id="post-bottom" class="post-bottom shadow-sm">
                <div class="post-bottom__meta border-bottom p-4">
                    <div class="d-lg-flex align-items-start gap-4">
                        <div class="d-flex flex-column">


                            <h1 class="post-title post-title-xl text-body"> &#8211;
                                {{ $hashVideo->titre }}</h1>
                            <div class="post-meta">
                                <div class="post-meta__items">
                                    <div class="post-meta__comment">
                                        <a href="index.html#respond">

                                            <span class="post-meta__icon icon-chat-empty"></span>
                                            <span class="post-meta__text">0
                                                comments</span>
                                        </a>
                                    </div>


                                    <div class="post-meta__views">
                                        <span class="icon-eye"></span>
                                        {{ $video->views_count }} views
                                    </div>
                                </div>
                                {{-- <form action="{{ route('videos.favorite', $video) }}" method="post">
                                    @csrf
                                    <button type="submit"
                                            class="flex items-center space-x-2 {{ auth()->user()->favoriteVideos->contains($video) ? 'text-red-500' : 'text-gray-500' }}">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             viewBox="0 0 24 24" class="w-6 h-6">
                                            <path
                                                d="M5 3c0-1.107.893-2 2-2s2 .893 2 2s-2 .908-2 2c0 1.52 1.474 2.893 3 3.917c1.526-1.024 3-2.397 3-3.917c0-1.107.893-2 2-2s2 .893 2 2s-2 .908-2 2c0 2.21-1.79 4-4 4s-4-1.79-4-4s-1.79-4-4-4s-4 1.79-4 4s-1.79 4-4 4s-3-1.79-3-4s1.34-4 3-4s3 1.79 3 4z">
                                            </path>
                                        </svg>
                                        <span>Add to Favorites</span>
                                    </button>
                                </form> --}}


                                <span class="post-meta__icon icon-chat-empty"></span>
                                <span class="post-meta__text">{{ $hashVideo->description }}</span>
                            </div>
                        </div>
                        <div class="video-small-controls d-flex gap-2 ms-lg-auto justify-content-center my-sm-3">
                            <button id="turn-off-light" class="btn p-1 rounded-1 bg-light border" title="Turn off light"
                                data-on-title="Turn off light" data-off-title="Turn on light"> <span
                                    class="text-secondary icon-lightbulb"></span>
                            </button>
                            <button id="btn-up-next" class="btn p-1 rounded-1 bg-light border btn-upnext "
                                title="Turn on Up Next" data-on-title="Turn on Up Next"
                                data-off-title="Turn off Up Next"> <span class="text-secondary icon-toggle-off"></span>
                            </button>
                            <div class="next-prev-nav d-flex gap-2">
                                <a id="previous-post-link" class="btn p-1 rounded-1 bg-light border"
                                    href="../WjnegJYdwZ/index.html" title="Just Cause 3 Gameplay Trailer"> <span
                                        class="text-secondary icon-left-open"></span>
                                </a>
                                <a id="next-post-link" class="btn p-1 rounded-1 bg-light border"
                                    href="../yMYerkEaOB/index.html" title="Exploring Witcher 3&#039;s Open World"> <span
                                        class="text-secondary icon-right-open"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="post-options d-flex pt-4">
                        <div class="d-flex mx-auto gap-4">
                            <div class="button-group button-group-gift">
                                <button type="button" class="btn shadow-none px-1 " data-bs-toggle="modal"
                                    data-bs-target="#modal-login" title="Send Points as a Gift"> <span
                                        class="btn__icon icon-gift"></span>
                                </button>
                            </div>
                            <div class="wppl-button-wrap button-group position-relative">
                                <div class="d-flex gap-4">
                                    <form action="{{ route('videos.like', $video) }}" method="post">
                                        @csrf
                                        <button type="submit">

                                        </button>
                                    </form>

                                    <form class="form-ajax form-post-like position-relative" action="{{ route('videos.like', $video) }}" method="post">
                                        @csrf
                                        <button class="wppl-like-button btn px-1 border-0 position-relative shadow-none {{ auth()->user()->likes()->where('video_id', $video->id)->exists() ? 'liked' : '' }}"
                                                type="submit">
                                            <span class="btn__icon">
                                                <span class="icon-thumbs-up"></span>
                                            </span>
                                            <span class="btn__badge badge bg-secondary position-absolute">
                                                {{ $video->likesCount() }}
                                            </span>
                                        </button>
                                    </form>


                                    <form class="form-ajax form-post-like position-relative" method="post">
                                        <button type="button" value="dislike"
                                            class="wppl-dislike-button btn px-1 border-0 position-relative shadow-none "
                                            data-bs-toggle="modal" data-bs-target="#modal-login"> <span
                                                class="btn__icon"><span class="icon-thumbs-down"></span></span>
                                            <span class="btn__badge badge bg-secondary position-absolute">
                                                1 </span>
                                        </button>
                                        <input type="hidden" name="action" value="post_like">
                                        <input type="hidden" name="do_action" value="dislike">
                                        <input type="hidden" name="post_id" value="51">
                                        <input type="hidden" name="nonce" value="1ea413ba56"> <input type="hidden"
                                            name="request_url"
                                            value="https://streamtube.marstheme.com/wp-json/wp-post-like/v1/like">
                                    </form>
                                </div>
                            </div>
                            <div class="button-group button-group-share">
                                <button class="btn shadow-none px-1" data-bs-toggle="modal"
                                    data-bs-target="#modal-video-share" title="Share">
                                    <span class="btn__icon icon-share"></span>
                                </button>
                            </div>
                            <div class="button-group button-group-report">
                                <button class="btn shadow-none px-1" data-bs-toggle="modal"
                                    data-bs-target="#modal-login" title="Report"> <span
                                        class="btn__icon icon-flag-empty"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-bottom__author d-flex align-items-center border-bottom p-4">
                    <div class="author__avatar d-flex align-items-center">
                        <div class="post-author me-4">
                            <div class="user-avatar is-off user-avatar-xl"><a data-bs-toggle="tooltip"
                                    data-bs-placement="right"
                                    class="d-flex align-items-center fw-bold text-decoration-none" title="Audrey"
                                    href="#"><img alt src="/images/AdobeStock_614217681_Preview.jpeg"
                                        class="avatar avatar-200 photo img-thumbnail" height="200" width="200"
                                        loading="lazy" decoding="async" /></a></div>
                        </div>
                        {{--    commentair --}}
                        <div class="author-info d-flex flex-column">
                            <h3 class="author-name h6 mb-3"><a class="text-body fw-bold text-decoration-none"
                                    title="Audrey"
                                    href="#">{{ $hashVideo->realisateur }}</a>
                            </h3>
                            <div class="d-flex gap-3 align-items-center">
                                <div class="follow-button-group " data-user-id="7">
                                    <form class="form-ajax" method="post">
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-follow shadow-none px-3 d-inline-flex d-flex align-items-center btn-secondary btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#modal-login">
                                                <span class="btn__icon icon-plus"></span>
                                                <span class="btn__text">Follow</span>
                                            </button>
                                            <button class="btn btn-sm btn-danger px-3">2</button>
                                        </div>

                                    </form>
                                </div>
                                <div class="button-private-message">
                                    <button id="btn-private-message"
                                        class="btn px-2 shadow-none d-flex align-items-center btn-sm position-relative btn-secondary"
                                        data-bs-toggle="modal" data-bs-target="#modal-login" data-recipient-id="7">
                                        <span
                                            class="btn__icon position-absolute top-50 start-50 translate-middle icon-mail"
                                            data-bs-toggle="tooltip" data-bs-title="Private Message"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-donate-wrap ms-auto">
                        <div class="button-group">
                            <button
                                class="btn btn-sm btn-danger px-4 shadow-none d-flex align-items-center justify-content-center gap-1 d-block w-100"
                                data-bs-toggle="modal" data-bs-target="#modal-login">
                                <span class="btn__icon text-white icon-dollar"></span>
                                <span class="btn__text text-white">
                                    Donate </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="post-bottom__content p-4">
                    <div class="post-content">
                        <div class="js-read-wrap">
                            <div class="js-read">
                                <p>Votre vie privée, visiteur, est extrêmement importante
                                    pour nous, et la politique de confidentialité contenue
                                    dans ce document représente un aperçu des types
                                    d'informations personnelles collectées par (S Khadim
                                    Rafahi).</p>
                            </div><button
                                class="btn btn-block shadow-none border-0 d-block w-100 js-read-toggler d-none"><span
                                    class="btn__icon icon-angle-double-down text-secondary"></span></button>
                        </div>
                        <div class="post-tags mb-3">
                            <span class="icon-tags text-muted mr-2"></span>
                            <a href="#" rel="tag">informatique</a> <a
                                href="#" rel="tag">Featured</a> <a
                                href="#" rel="tag">Xam Xam</a> <a

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
