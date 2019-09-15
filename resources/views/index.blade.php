@extends('layouts.main')
@section('content')
    <main role="main" class="container">
        <form method = "get"  action="{{route('search-article')}}">
            <div id="wrap">
                <form action="" autocomplete="on">
                    <input class="my-input" type="text" name="search" placeholder="Search..">  </form>
            </div>
        </form>
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">Featured post</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Design</strong>
                        <h3 class="mb-0">Post title</h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    The best articles for you
                </h3>
                @foreach($articles as $article)
{{--                    @if($key <2)--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">--}}
{{--                                <div class="col p-4 d-flex flex-column position-static">--}}
{{--                                    <strong class="d-inline-block mb-2 text-success">Design</strong>--}}
{{--                                    <h3 class="mb-0">{{$article->title}}</h3>--}}
{{--                                    <div class="mb-1 text-muted">Nov 11</div>--}}
{{--                                    <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>--}}
{{--                                    <a href="#" class="stretched-link">Continue reading</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-auto d-none d-lg-block">--}}
{{--                                    @if($article->images)--}}
{{--                                        <img src="{{asset("storage/articles/$article->id/$article->images")}}">--}}
{{--                                    @else--}}
{{--                                        <img src="data:image/jpeg;base64,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">--}}
{{--                                    @endif                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    @else--}}
                <div class="blog-post">
                        <div class="blog-post">
                            @if($article->images)
                                <img src="{{asset("storage/articles/$article->id/$article->images")}}">
                            @else
                                <img src="data:image/jpeg;base64,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">
                            @endif
                            <h2 class="blog-post-title">{{$article->title}}</h2>
                            <p class="blog-post-meta">January 1, 2014 by <a href="#"></a></p>
                            <p>{{$article->description}}</p>
                        </div><!-- /.blog-post -->
                        <nav class="blog-pagination">
                            @if(Auth::user() && Auth::user()->id == $article->user_id)
                            <a class="btn btn-outline-primary" href="{{route('edit-article',[$article->id])}}">Edit</a>
                            <a class="btn btn-outline-primary" href="{{route('delete-article',[$article->id])}}">Delete</a>
                            @endif
                        </nav>
                    </div>
{{--                    @endif--}}
                @endforeach
                <div class="center">
                    {!! $articles->links(); !!}
                </div>
            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar">


                <div class="month">
                    <ul>
                        <li class="prev">❮</li>
                        <li class="next">❯</li>
                        <li>
                            September<br>
                            <span style="font-size:18px">2019</span>
                        </li>
                    </ul>
                </div>

                <ul class="weekdays">
                    <li>Mo</li>
                    <li>Tu</li>
                    <li>We</li>
                    <li>Th</li>
                    <li>Fr</li>
                    <li>Sa</li>
                    <li>Su</li>
                </ul>

                <ul class="days">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li>7</li>
                    <li>8</li>
                    <li>9</li>
                    <li>10</li>
                    <li>11</li>
                    <li>12</li>
                    <li><span class="active">13</span></li>
                    <li>14</li>
                    <li>15</li>
                    <li>16</li>
                    <li>17</li>
                    <li>18</li>
                    <li>19</li>
                    <li>20</li>
                    <li>21</li>
                    <li>22</li>
                    <li>23</li>
                    <li>24</li>
                    <li>25</li>
                    <li>26</li>
                    <li>27</li>
                    <li>28</li>
                    <li>29</li>
                    <li>30</li>
                    <li>31</li>
                </ul>



                </body>
                </html>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main><!-- /.container -->

@stop

