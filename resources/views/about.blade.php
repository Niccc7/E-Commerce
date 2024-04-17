@extends('Template.Layouts.second')
@section('content-product')
    <style>
        html,
        body {
            height: 100vh;
            margin: 0; 
            padding: 0;
        }
        .about-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80%;
            padding: 0 10%;
            margin-top: 5rem;   
        }

        .about-title {
            font-size: 3rem;
            color: #668A89;
            margin-bottom: 2rem;
        }

        .about-text {
            font-size: 1.2rem;
            text-align: justify;
            margin-bottom: 2rem;
        }

        .created-by {
            font-size: 1.2rem;
        }

        .creator-names {
            font-size: 1.3rem;
        }

        .about-contact {
            font-size: 1.4rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .content-bot {
            color: #f2f2f2;
            display: flex;
            background-color: #668A89;
            width: 100%;
            position: fixed; /* Fix the footer at the bottom of the viewport */
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1030; /* Set a higher z-index than the content to ensure the footer stays on top */
        }

        .footer-text {
            padding: 0;
            padding-left: 39.5%;
            margin-bottom: 20px;
            font-size: 16px;
        }
    </style>
    <div class="about-section">
        <h1 class="about-title">About Us</h1>
        <p class="about-text">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim unde at repellendus ratione nisi tempore? Molestias fugit dicta asperiores a at, itaque nam, nesciunt magni dolorum quis molestiae minima vel distinctio fuga eos voluptate blanditiis? Dolore, aspernatur, mollitia fugit hic explicabo ratione quam facilis voluptatum, repellendus voluptate nihil ipsam sunt molestias qui a consequatur ipsum possimus alias error inventore eum! Laborum dolorum sapiente facere minima ratione beatae obcaecati eaque vel id? Esse nihil dolores id, sit earum nam ipsam, non voluptates voluptate fugiat corrupti dolorem aspernatur officiis omnis temporibus? Repudiandae reiciendis ea quasi qui natus possimus obcaecati laudantium eveniet veniam!        
        </p>
        {{-- <p>Created By Niccc, Devon & Endian</p> --}}
        <p class="created-by">Created By:</p>
        <p class="creator-names">Niccc, Devon & Endian</p>
        <p class="about-contact">
        <br>
            Contact us at <a href="#">info@example.com</a>
        </p>
    </div>
@endsection
@section('footer')
    <footer style="margin-top:0;">
        <style>
            .content-bot {
                color: #f2f2f2;
                display: flex;
                background-color: #668A89;
                width: 100%;
                position: fixed; /* Fix the footer at the bottom of the viewport */
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 1030; /* Set a higher z-index than the content to ensure the footer stays on top */
            }
            .footer-copyright {
                padding: 1rem 0;
                font-size: 16px;
                text-align: center;
            }
        </style>
        <div class="content-bot">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-copyright">
                            <p class="mb-0">&copy; Copyright Saudagar 2024. All right reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection