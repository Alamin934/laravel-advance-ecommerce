<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">categories</div>
                        </div>

                        <ul class="cat_menu">
                            @foreach ($categories as $category)

                            <li class="{{count($category->sub_categories) == 0 ? '' : 'hassubs'}}">
                                <a href="{{route('linkWise.product', ['id'=>$category->id, 'link'=>'category'])}}">
                                    <img src="{{asset('assets/admin/files/category/'.$category->icon)}}"
                                        style="width:20px;margin-right:5px;" alt="{{ $category->slug }}">
                                    {{ $category->name }}
                                    <span
                                        class="badge badge-pill badge-primary font-weight-normal">{{count($category->products)}}</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                                <ul>
                                    @foreach ($category->sub_categories as $sub_category)

                                    <li class="{{count($sub_category->ChildCategory) == 0 ? '' : 'hassubs'}}">
                                        <a
                                            href="{{route('linkWise.product', ['id'=>$sub_category->id, 'link'=>'sub_category'])}}">{{$sub_category->name}}
                                            {{-- <span
                                                class="badge badge-pill badge-primary font-weight-normal">{{count($sub_category->products)}}</span>
                                            --}}
                                            <i class="fas fa-chevron-right"></i></a>
                                        <ul>
                                            @foreach ($sub_category->ChildCategory as $child_category)

                                            <li>
                                                <a
                                                    href="{{route('linkWise.product', ['id'=>$child_category->id, 'link'=>'child_category'])}}">{{$child_category->name}}
                                                    {{-- <span
                                                        class="badge badge-pill badge-primary font-weight-normal">{{count($child_category->products)}}</span>
                                                    --}}
                                                    <i class="fas fa-chevron-right"></i></a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="{{route('home')}}">Home<i class="fas fa-chevron-down"></i></a></li>
                            <li><a href="{{route('shop')}}">Shop<i class="fas fa-chevron-down"></i></a></li>
                            {{-- <li class="hassubs">
                                <a href="javascript:void(0)">Pages<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <li>
                                        <a href="{{route('shop')}}">Shop
                                            <i class="fas fa-chevron-down"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            <li><a href="{{route('contact')}}">Contact<i class="fas fa-chevron-down"></i></a></li>
                        </ul>
                    </div>

                    <!-- Menu Trigger -->

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>