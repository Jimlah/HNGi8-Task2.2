<?php 
require_once './vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// filter input
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$messages = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

if (!isset($firstname) || !isset($lastname) || !isset($email) || $email == "" || !isset($messages)) {
$_COOKIE['alert'] = ['status' => false, 'message' => 'Message failed to send!'];
header("Location: /");
}


// create email body and send it
$transport = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
$transport->setUsername('dufmanigeria@gmail.com')
->setPassword('Dufma12345');

$mailer = new Swift_Mailer($transport);

$message = new Swift_Message('Nessage from Resume');
$message->setFrom(array($email => $firstname . ' ' . $lastname))
->setTo(array('abdullahij951@gmail.com' => $firstname . ' ' . $lastname))
->setBody('<p>' . $messages . '</p>')
->setContentType('text/html');

$result = $mailer->send($message);

if ($result) {
$message = ['status' => true, 'message' => 'Message sent successfully!'];
} else {
$message = ['status' => false, 'message' => 'Message failed to send!'];
}


$_COOKIE['alert'] = $message;


header("refresh:10;url=/");
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="stylesheet" href="./tailwind.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="static">
    <div class="h-screen w-full overflow-hidden bg-gray-800">
        <div class="text-gray-100 flex h-full w-full ">
            <nav class="px-2 flex flex-col items-center justify-between py-3  h-full">
                <div class="h-full flex flex-col justify-center space-y-5">
                    <a href="#home" class="hover:text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                    <a href="#skills" class="hover:text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </a>
                    <a href="#contact" class="hover:text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                    </a>

                </div>
                <a href="./file/resume.pdf" class="hover:text-gray-500 self-end" download="resume.pdf">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10">
                        </path>
                    </svg>
                </a>
            </nav>
            <main class="h-full w-full overflow-y-auto">
                <section id="home" class="flex sm:h-full w-full space-x-2 flex-col sm:flex-row">
                    <div class="w-full h-full sm:w-2/5 bg-center bg-cover bg-no-repeat"
                        style="background-image:url('./img/img2.jpg')">
                        <div class="w-full h-full flex flex-col items-center justify-end py-5 space-y-2">
                            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold">Abdullahi Jimoh</h2>
                            <span class="text-sm text-green-500 font-semibold">Software Developer</span>
                            <div class="flex items-center justify-center space-x-3">
                                <a href="https://github.com/Jimlah" class="h-4 w-4 hover:text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-github" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                    </svg>
                                </a>
                                <a href="https://www.linkedin.com/in/abdullahi-j-39b852ab/"
                                    class="h-4 w-4 hover:text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-linkedin" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                    </svg>
                                </a>
                                <a href="https://mobile.twitter.com/ajimoh321" class="h-4 w-4 hover:text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path
                                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                    </svg>
                                </a>
                                <a href="" class="h-4 w-4 hover:text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full sm:w-3/5 h-full flex flex-col space-y-3 px-2 justify-center items-center">
                        <div class="flex flex-col space-y-5 py-2">
                            <h2 class="font-bold text-4xl">About Me</h2>
                            <span class="text-sm text-green-500 capitalize italic font-bold">
                                23 years / Freelance
                            </span>
                            <p class="text-gray-200">
                                Prolific, I am a full stack developer with a strong background in web development. I
                                have a strong background in JavaScript, PHP, SQL, Python, HTML and CSS. I have
                                experience in building web applications using the PHP and JavaScript, and have worked
                                with
                                a variety of other technologies such as Laravel, Nodejs, React, git and more.
                            </p>
                        </div>
                        <hr class="bg-gray-500">
                        <div>
                            <h2 class="font-bold text-4xl mb-5">Services</h2>
                            <div class="grid grid-cols-2 gap-3 md:gap-5">
                                <div class="flex flex-col items-start justify-center">
                                    <span class="h-6 w-6 text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-display" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z" />
                                        </svg>
                                    </span>
                                    <h3 class="uppercase text-sm font-bold">Development</h3>
                                    <p class="text-gray-200 text-xs leading-5">
                                        Building a custom website using the latest web technologies based on your
                                        technical specific needs.
                                    </P>
                                </div>
                                <div>
                                    <span class="h-6 w-6 text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-display" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z" />
                                        </svg>
                                    </span>
                                    <h3 class="uppercase text-sm font-bold">Development</h3>
                                    <p class="text-gray-200 text-xs leading-5">
                                        Building a custom website using the latest web technologies based on your
                                        technical specific needs.
                                    </P>
                                </div>
                                <div>
                                    <span class="h-6 w-6 text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-display" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z" />
                                        </svg>
                                    </span>
                                    <h3 class="uppercase text-sm font-bold">Development</h3>
                                    <p class="text-gray-200 text-xs leading-5">
                                        Building a custom website using the latest web technologies based on your
                                        technical specific needs.
                                    </P>
                                </div>
                                <div>
                                    <span class="h-6 w-6 text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-display" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z" />
                                        </svg>
                                    </span>
                                    <h3 class="uppercase text-sm font-bold">Development</h3>
                                    <p class="text-gray-200 text-xs leading-5">
                                        Building a custom website using the latest web technologies based on your
                                        technical specific needs.
                                    </P>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <section id="skills" class="h-full w-full flex flex-col items-start justify-center px-5 py-10">
                    <h2 class="font-bold text-3xl text-left mb-5">
                        Skills
                    </h2>
                    <div class="grid grid-col-1 sm:grid-cols-2 w-full gap-10">
                        <div>
                            <span class="text-sm uppercase">Html</span>
                            <div class="w-full h-2 rounded-full bg-gray-500 overflow-hidden flex justify-start">
                                <div class="h-full bg-green-500 border w-full"></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-sm uppercase">CSS</span>
                            <div class="w-full h-2 rounded-full bg-gray-500 overflow-hidden flex justify-start">
                                <div class="h-full bg-green-500 border w-full"></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-sm uppercase">php</span>
                            <div class="w-full h-2 rounded-full bg-gray-500 overflow-hidden flex justify-start">
                                <div class="h-full bg-green-500 border w-11/12"></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-sm uppercase">sql</span>
                            <div class="w-full h-2 rounded-full bg-gray-500 overflow-hidden flex justify-start">
                                <div class="h-full bg-green-500 border w-11/12"></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-sm uppercase">Javascript</span>
                            <div class="w-full h-2 rounded-full bg-gray-500 overflow-hidden flex justify-start">
                                <div class="h-full bg-green-500 border w-11/12"></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-sm uppercase">Nodejs</span>
                            <div class="w-full h-2 rounded-full bg-gray-500 overflow-hidden flex justify-start">
                                <div class="h-full bg-green-500 border w-6/12"></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-sm uppercase">Laravel</span>
                            <div class="w-full h-2 rounded-full bg-gray-500 overflow-hidden flex justify-start">
                                <div class="h-full bg-green-500 border w-10/12"></div>
                            </div>
                        </div>
                        <div>
                            <span class="text-sm uppercase">Git</span>
                            <div class="w-full h-2 rounded-full bg-gray-500 overflow-hidden flex justify-start">
                                <div class="h-full bg-green-500 border w-8/12"></div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="contact" class="h-full w-full flex flex-col items-center justify-center px-5 py-10">
                    <div class="max-w-md w-full flex-col flex space-y-5">
                        <h2 class="font-bold text-3xl text-left">
                            Contact Me
                        </h2>
                        <form action="" method="POST" class="w-full grid grid-col-1 gap-3">
                            <div class="w-full">
                                <label for="firstname" class="font-bold text-sm tracking-wider uppercase">First
                                    Name</label>
                                <input type="text" name="firstname"
                                    class="px-5 py-3 focus:outline-none text-gray-700 border-2 rounded-md hover:border-green-500 w-full"
                                    placeholder="First Name" id="firstname">
                            </div>
                            <div class="w-full">
                                <label for="lastname" class="font-bold text-sm tracking-wider uppercase">Last
                                    Name</label>
                                <input type="text" name="lastname"
                                    class="px-5 py-3 focus:outline-none text-gray-700 border-2 rounded-md hover:border-green-500 w-full"
                                    placeholder="Last Name" id="lastname">
                            </div>
                            <div class="w-full">
                                <label for="email" class="font-bold text-sm tracking-wider uppercase">Email</label>
                                <input type="text" name="email"
                                    class="px-5 py-3 focus:outline-none text-gray-700 border-2 rounded-md hover:border-green-500 w-full"
                                    placeholder="Email" id="email">
                            </div>
                            <div class="w-full">
                                <label for="message" class="font-bold text-sm tracking-wider uppercase">Message</label>
                                <textarea name="message"
                                    class="px-5 py-3 h-48 focus:outline-none text-gray-700 border-2 rounded-md hover:border-green-500 w-full"
                                    placeholder="Message" id="message">Put Your Message Here</textarea>
                            </div>
                            <div class="w-full">
                                <button type="submit" name="submit"
                                    class="px-5 py-3 bg-green-700 focus:outline-none rounded-md hover:bg-transparent hover:border-green-700 border-2 border-transparent w-full text-white font-bold">Send</button>
                            </div>
                    </div>
                    </form>
                </section>

            </main>
        </div>
    </div>
    <?php  if (isset($message)) {
        ?>
    <div
        class="absolute top-0 right-0 text-white font-semibold px-3 py-2 <?= $message['status'] ? 'bg-green-500' : 'bg-red-500' ?>">
        <?= $message['message'] ?>
    </div>

    <?php
    } ?>

    <script>
    // click on button then download a file
    </script>
</body>

</html>