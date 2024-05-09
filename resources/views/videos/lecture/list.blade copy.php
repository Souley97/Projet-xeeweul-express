<div id="content-bottom" class="sidebar sidebar-content-bottom w-full">
    <div id="posts-widget-2" class="widget widget-content-bottom posts-widget streamtube-widget">
        <!-- Résultats de la recherche -->

        <div class="widget-title-wrap">
            <h2 class="widget-title d-flex align-items-center"> Xam Xam </h2>
        </div>
        <div class="  post-grid post-grid-light post-grid-grid post-grid-avatar post-grid-avatar-size-md" data-page="1" data-max-pages="3">
            <div class=" row  row-cols-sm-3 row-cols-md-3 row-cols-xl-3">
                @foreach ($videoShearch as $videoList)
                    <div class="post-item  mb-4n">
                        <article
                            class="post-134 video type-video status-publish has-post-thumbnail hentry categories-gaming video_tag-featured video_tag-game video_tag-ghost video_tag-tsushima pmpro-has-access">
                            <div class="post-body position-relative">


                                <div class="post-main position-relative rounded overflow-hidden">
                                    <a class="post-permalink" title="Ghost of Tsushima"
                                        href="{{ route('videos.show', $videoList->slug) }}">
                                        <div class="post-thumbnail ratio ratio-16x9 rounded overflow-hidden bg-dark">
                                            <video width="560" height="287"
                                                src="{{ asset('storage/videos/' . $videoList->chemin_vers_video) }}"
                                                class="img-fluid wp-post-image" alt="">
                                                < <div class="video-hover">

                                                    <span
                                                        class="icon-play top-50 start-50 translate-middle position-absolute"></span>
                                        </div>
                                        <div class="video-length badge">
                                            {{ $videoList->duree_minutes }}</div>
                                </div>
                                </a>

                            </div>
                            <div class="post-bottom mt-3 d-flex align-items-start">
                                <div class="me-2">
                                    <div class="post-avatar ">
                                        <div class="user-avatar is-off user-avatar-md"><a data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                class="d-flex align-items-center fw-bold text-decoration-none"
                                                title="Celina" href="#"><img alt="Khadime lo rafahi"
                                                    src="/images/bg/xe/khadime.jpeg" srcset="/images/bg/xe/khadime.jpeg"
                                                    class="avatar avatar-200 photo img-thumbnail" height="200"
                                                    width="200" loading="lazy" decoding="async" /></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-meta w-100">
                                    <h2 class="post-meta__title post-title"><a title="Ghost of Tsushima"
                                            href="../EKQe1rjaJY/index.html">{{ $videoList->titre }}</a>
                                    </h2>
                                    <div class="post-meta__items d-flex flex-column">
                                        <div class="post-meta__author">
                                            <a href="{{ route('videos.show', $videoList->id) }}">
                                                <span class="post-meta__icon icon-user-o"></span>
                                                <span class="post-meta__text">{{ $videoList->realisateur }}</span>
                                            </a>
                                        </div>
                                        <div class="d-flex gap-3">
                                            <div class="post-meta__views">
                                                <span class="icon-eye"></span>
                                                {{ $videoList->views_count }} views
                                            </div>
                                            <div class="post-meta__date">
                                                <span class="icon-calendar-empty"></span>
                                                <a title="Ghost of Tsushima" href="../EKQe1rjaJY/index.html">
                                                    <time datetime="{{ $videoList->created_at }}" class="date">
                                                        {{ $videoList->created_at->diffForHumans() }}
                                                    </time>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </article>
            </div>
            @endforeach


            <div class="post-item  mb-4">
                <article
                    class="post-55 video type-video status-publish has-post-thumbnail hentry categories-gaming video_tag-arkham video_tag-batman video_tag-game video_tag-knight video_tag-trailer pmpro-level-required pmpro-level-4 pmpro-no-access"
                   >
                    <div class="post-body position-relative">
                        <div class="post-main position-relative rounded overflow-hidden">
                            <div class="post-permalink" title="Batman: Arkham Knight &#8211; Meeting The Arkham Knight">
                                <div class="post-thumbnail ratio ratio-16x9 rounded overflow-hidden bg-dark">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/QtToOtjWSbQ?si=fwkIYSZwO-k9NuLa"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                    <div class="video-paid badge">
                                        <span class="icon icon-lock"></span>
                                    </div>
                                    {{-- <div class="video-hover">
                                        <span
                                            class="icon-play top-50 start-50 translate-middle position-absolute"></span>
                                    </div> --}}

                                </div>
                            </div>
                            <div class="post-bottom mt-3 d-flex align-items-start">
                                <div class="me-2">
                                    <div class="post-avatar ">
                                        <div class="user-avatar is-off user-avatar-md"><a data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                class="d-flex align-items-center fw-bold text-decoration-none"
                                                title="Audrey" href="../../author/audrey/index.html"><img alt
                                                    src="../../wp-content/uploads/2021/08/avatar-16.jpg"
                                                    srcset="https://streamtube.marstheme.com/wp-content/uploads/2021/08/avatar-16.jpg 2x"
                                                    class="avatar avatar-200 photo img-thumbnail" height="200"
                                                    width="200" loading="lazy" decoding="async" /></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-meta w-100">
                                    <h2 class="post-meta__title post-title"><a
                                            title="Batman: Arkham Knight &#8211; Meeting The Arkham Knight"
                                            href="../7LDdwpRe1Y/index.html">Groupe infirmatique VIP</a></h2>
                                    <div class="post-meta__items d-flex flex-column">
                                        <div class="post-meta__author">
                                            <a href="../../author/audrey/index.html">
                                                <span class="post-meta__icon icon-user-o"></span>
                                                <span class="post-meta__text">S.Khadim Lo Rafahi</span>
                                            </a>
                                        </div>
                                        <div class="d-flex gap-3">
                                            <div class="post-meta__views">
                                                <span class="icon-eye"></span>
                                                61 views
                                            </div>
                                            <div class="post-meta__date">
                                                <span class="icon-calendar-empty"></span>
                                                <a title="Batman: Arkham Knight &#8211; Meeting The Arkham Knight"
                                                    href="../7LDdwpRe1Y/index.html">
                                                    <time datetime="2021-08-18 14:18:00" class="date">2 years</time>
                                                    ago </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </article>
            </div>




        </div>
    </div>
    <div class="pagination-nav d-flex justify-content-center navigation border-bottom mb-5 position-relative">
        <button type="button"
            class="btn border text-secondary widget-load-more-posts jsappear bg-light shadow-none load-on-click"
            data-params="{&quot;id&quot;:&quot;&quot;,&quot;_id&quot;:&quot;posts-widget-2&quot;,&quot;id_base&quot;:&quot;posts-widget&quot;,&quot;title&quot;:&quot;Related Videos&quot;,&quot;icon&quot;:&quot;&quot;,&quot;style&quot;:&quot;light&quot;,&quot;_current_logged_in&quot;:false,&quot;_current_author&quot;:&quot;7&quot;,&quot;_current_post&quot;:51,&quot;live_stream&quot;:&quot;&quot;,&quot;live_status&quot;:[&quot;connected&quot;],&quot;related_posts&quot;:&quot;on&quot;,&quot;related_post_tax&quot;:&quot;&quot;,&quot;exclude_current_post&quot;:&quot;on&quot;,&quot;post_type&quot;:[&quot;video&quot;],&quot;post_status&quot;:[&quot;publish&quot;],&quot;paged&quot;:1,&quot;s&quot;:&quot;&quot;,&quot;author&quot;:&quot;&quot;,&quot;author_name&quot;:&quot;&quot;,&quot;author__in&quot;:[],&quot;author__not_in&quot;:[],&quot;role__in&quot;:[],&quot;role__not_in&quot;:[],&quot;post__in&quot;:[],&quot;post__not_in&quot;:[],&quot;comment_count&quot;:&quot;&quot;,&quot;comment_compare&quot;:&quot;&quot;,&quot;current_logged_in&quot;:&quot;&quot;,&quot;current_logged_in_like&quot;:&quot;&quot;,&quot;current_logged_in_history&quot;:&quot;&quot;,&quot;current_logged_in_watch_later&quot;:&quot;&quot;,&quot;current_logged_in_following&quot;:&quot;&quot;,&quot;current_logged_in_follower&quot;:&quot;&quot;,&quot;current_author&quot;:&quot;&quot;,&quot;current_author_like&quot;:&quot;&quot;,&quot;current_author_following&quot;:&quot;&quot;,&quot;current_author_follower&quot;:&quot;&quot;,&quot;current_author_history&quot;:&quot;&quot;,&quot;current_author_watch_later&quot;:&quot;&quot;,&quot;hide_if_no_matched_user_filter&quot;:&quot;&quot;,&quot;verified_users_only&quot;:false,&quot;posts_per_page&quot;:&quot;6&quot;,&quot;auto_tax_query&quot;:&quot;&quot;,&quot;tax_query&quot;:[],&quot;_tax_query&quot;:[],&quot;date_query&quot;:[],&quot;date_before&quot;:&quot;&quot;,&quot;date_after&quot;:&quot;&quot;,&quot;date&quot;:&quot;&quot;,&quot;date_modified&quot;:&quot;&quot;,&quot;meta_query&quot;:[],&quot;content_cost&quot;:&quot;&quot;,&quot;level_type&quot;:&quot;&quot;,&quot;level__in&quot;:[],&quot;level__not_in&quot;:[],&quot;ref_products&quot;:[],&quot;custom_orderby&quot;:&quot;&quot;,&quot;meta_key&quot;:&quot;&quot;,&quot;orderby&quot;:&quot;rand&quot;,&quot;order&quot;:&quot;relevance&quot;,&quot;center_align_items&quot;:&quot;&quot;,&quot;index_number&quot;:&quot;&quot;,&quot;layout&quot;:&quot;grid&quot;,&quot;title_size&quot;:&quot;&quot;,&quot;margin&quot;:&quot;yes&quot;,&quot;margin_bottom&quot;:4,&quot;overlay&quot;:&quot;&quot;,&quot;col_xxl&quot;:3,&quot;col_xl&quot;:3,&quot;col_lg&quot;:2,&quot;col_md&quot;:2,&quot;col_sm&quot;:2,&quot;col&quot;:1,&quot;show_post_date&quot;:&quot;diff&quot;,&quot;show_post_comment&quot;:&quot;on&quot;,&quot;show_author_name&quot;:&quot;on&quot;,&quot;show_post_view&quot;:&quot;on&quot;,&quot;author_avatar&quot;:&quot;on&quot;,&quot;avatar_size&quot;:&quot;md&quot;,&quot;avatar_name&quot;:&quot;&quot;,&quot;post_excerpt_length&quot;:0,&quot;hide_thumbnail&quot;:&quot;&quot;,&quot;hide_empty_thumbnail&quot;:&quot;&quot;,&quot;thumbnail_size&quot;:&quot;streamtube-image-medium&quot;,&quot;thumbnail_ratio&quot;:&quot;16x9&quot;,&quot;hide_if_empty&quot;:&quot;on&quot;,&quot;hide_if_not_logged_in&quot;:&quot;&quot;,&quot;hide_if_not_author&quot;:&quot;&quot;,&quot;show_if_user_can_cap&quot;:&quot;&quot;,&quot;show_if_user_in_roles&quot;:&quot;&quot;,&quot;pagination&quot;:&quot;click&quot;,&quot;container&quot;:true,&quot;not_found_text&quot;:&quot;&quot;,&quot;more_link&quot;:&quot;&quot;,&quot;more_link_url&quot;:&quot;&quot;,&quot;slide&quot;:&quot;&quot;,&quot;slide_rows&quot;:&quot;1&quot;,&quot;slide_dots&quot;:&quot;&quot;,&quot;slide_arrows&quot;:&quot;on&quot;,&quot;slide_center_mode&quot;:&quot;&quot;,&quot;slide_infinite&quot;:&quot;&quot;,&quot;slide_speed&quot;:&quot;2000&quot;,&quot;slide_autoplay&quot;:&quot;&quot;,&quot;slide_autoplaySpeed&quot;:&quot;2000&quot;,&quot;search&quot;:&quot;&quot;,&quot;tab&quot;:&quot;layout&quot;}"
            data-action="widget_load_more_posts"> <span
                class="load-icon icon-angle-down position-absolute top-50 start-50 translate-middle"></span>
        </button>
    </div>
</div>
