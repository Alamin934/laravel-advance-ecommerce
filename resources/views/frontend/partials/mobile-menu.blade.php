<div class="page_menu">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page_menu_content">

                    <div class="page_menu_search">
                        <form action="#">
                            <input type="search" required="required" class="page_menu_search_input"
                                placeholder="Search for products...">
                        </form>
                    </div>
                    <ul class="page_menu_nav">
                        <li class="page_menu_item has-children">
                            <a href="#">Language<i class="fa fa-angle-down"></i></a>
                            <ul class="page_menu_selection">
                                <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                            </ul>
                        </li>
                        <li class="page_menu_item has-children">
                            <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                            <ul class="page_menu_selection">
                                <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                            </ul>
                        </li>

                        <li class="page_menu_item">
                            <a href="{{route('home')}}">Home<i class="fa fa-angle-down"></i></a>
                        </li>
                        <li class="page_menu_item">
                            <a href="{{route('shop')}}">Shop<i class="fa fa-angle-down"></i></a>
                        </li>
                        <li class="page_menu_item"><a href="">contact<i class="fa fa-angle-down"></i></a></li>
                    </ul>

                    <div class="menu_contact">
                        <div class="menu_contact_item">
                            <div class="menu_contact_icon"><img
                                    src="{{ asset('assets/frontend') }}/images/phone_white.png" alt=""></div>
                            +38 068 005 3570
                        </div>
                        <div class="menu_contact_item">
                            <div class="menu_contact_icon"><img
                                    src="{{ asset('assets/frontend') }}/images/mail_white.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>