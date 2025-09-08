<x-app-layout>
    <div class="page-blog-details pt--80 pb--45 bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="blog-details content">
                        <article class="blog-post-details">
                            <div class="post-thumbnail">
                                <img src="{{asset('storage/' . $author->photo) }}" alt="{{$author->getFullName()}}">
                            </div>
                            <div class="post_wrapper">
                                <div class="post_header">
                                    <h2>{{$author->getFullName()}}</h2>
                                </div>
                                <div class="post_content">
                                    {{$author->biography }}
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    <div class="wn__sidebar">
                        <!-- Start Single Widget -->
                        <aside class="widget recent_widget">
                            <h3 class="widget-title">Author's books</h3>
                            <div class="recent-posts">
                                <ul>
                                    @foreach($author->books as $book)
                                        <li>
                                            <div class="post-wrapper d-flex">
                                                <div class="thumb">
                                                    <a href="{{route('books.show', $book->id)}}">
                                                        <img src="{{asset('storage/' . $book->cover)}}" alt="{{ $book->title }}">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h4>
                                                        <a href="{{asset('storage/' . $book->cover)}}">{{ $book->title }}</a>
                                                    </h4>
                                                    <p> {{ $book->publication_year }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <aside class="widget category_widget">
                            <h3 class="widget-title">Genres</h3>
                            <ul>
                                @foreach($genres as $genre)
                                    <li>
                                        <a href="#">{{ $genre }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
