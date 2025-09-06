<!DOCTYPE html>
<html lang="en">
<head>
	@include('home.css')
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    @include('home.header')

    
    @include('home.about')
    
    @include('home.blog')

    @include('home.event', ['events' => $events ?? collect()])

    
    <!-- BLOG Section  -->
    
    <!-- REVIEWS Section  -->
    @include('home.review', ['reviews' => $reviews ?? collect()])

    @include('home.footer')
	
</body>
</html>
