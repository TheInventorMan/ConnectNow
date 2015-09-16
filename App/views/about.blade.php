@extends('layout')
@section('content')
<h1 id="page-header"><div class="container">About Us</div></h1>
<div id="page-subheading"><div class="container">I know that you know that I know who we are</div></div>
<div id="page-heading-text" style="background-image:url('{{URL::asset('img/about.jpg');}}');">
    <div id="page-heading-text-inner">
        <div class="container">
            <p>ConnectNow is a online site that empowers youth to collaborate with one another in developing new and innovative ideas. For those seeking an opportunity to work with others on brand new concepts, ConnectNow is your go to place to find ambitious individuals ready to cooperate on competitions, volunteer work, and new organizations.</p>
            <p>We’re promoting a community where students are able to market their own individual skills and abilities. A youth-lead team requires talents from a diverse set of subjects such as web-development, graphic-design, public-speaking, video-editing, and much more. If you are ready to build on your ideas, ConnectNow has the human resources you need to make it happen.</p>
        </div>
    </div>
</div>
<div class="container">
    <h2>The Movement</h2>
    <p>ConnectNow is a youth-led organization that came together with the collaboration of highschool students from grade ten to twelve students in Markham, Ontario.  When we started ConnectNow, we were a group of students each with a unique skill set that wanted to turn our idea into a reality- much like the focus of our site. Our goal was to create an online environment that allowed students to come together and collaborate with other like minded individuals. We each had our own ideas and skills that enabled us to make ConnectNow what it is. After getting all of our ideas and thoughts together, we were able to start to build and create the website to what we envisioned it to be.</p>
    <h2>Why?</h2>
    <p>ConnectNow prepares students to work on integral extra curricular activity that otherwise may not be possible because of time commitment and lack of resources. This site was started with a mission to provide to youth the ability to efficiently work on their ideas. Let’s give you an example:
    <blockquote>“Johnny would like to start an organization that focuses on promoting the arts with various events and local collaborations. He goes on ConnectNow and posts his idea with his personal credentials. Interested students who are willing to work with Johnny can then comment on the idea and send in their resumes to him. Instead of focusing his time on looking for partners on this project, Johnny has the people he needs come to him with applications. This is the platform that ConnectNow promotes and inspires to develop.”</blockquote>
    </p>
    <h2>How?</h2>
    <p>We have provided a responsive and multi-faceted design to our site that allows users to easily sign-up and start posting. ConnectNow makes it easy for everybody to create pages for interesting ideas. Our website provides a slick and beautiful design that will leave a lasting impression on your audience. All you have to do is make the pitch and get the idea moving.</p>
    <p>Once you have made a page for your idea, wait for interested participants to send in their contact information. We encourage students to meet online or in a safe and public environment for further conferences. From here on out, you have the public resources required to get your plan going. Whether it’s a science fair, a basketball gym rental, or a charity movement, we hope the team you create will be able to make it happen.</p>
    <h1 id="members">Our Team Members</h1>
    <div class="ui items">
    <?php
        $teamData = json_decode(file_get_contents(base_path().'/members.json'), true);
        foreach($teamData AS $teamMember){ ?>
            <div class="item">
                <div class="image">
                    <img src="//placehold.it/150x100">
                </div>
                <div class="content">
                    <div class="name"><?php echo $teamMember['name']; ?></div>
                    <p class="description">
                        <strong>Email: </strong> <?php echo strtolower(str_replace(' ', '', $teamMember['name'])); ?>@connectnow.today<br/>
                        <p><?php echo $teamMember['description']; ?></p>
                    </p>
                    <div class="extra">
                        <?php echo $teamMember['position']; ?>
                    </div>
                </div>
            </div>
    <?php }
    ?>
    </div>
</div>
<div class="spacer"></div>
@stop