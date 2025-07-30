<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCAlerto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { padding-top: 80px; }
        /* Custom styles */
        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; /* Lighter background for a modern feel */
            min-height: 100vh;
            display: flex;
            flex-direction: column; /* Allows footer to stick to bottom */
            /* padding-top is now applied to the <body> element dynamically by JavaScript */


            
        }
        .hero-bg {
            background-image: url(img/circleblur.jfif);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .dashboard-content::-webkit-scrollbar {
            width: 8px;
        }
        .dashboard-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .dashboard-content::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        .dashboard-content::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        /* Styles for dropdown menu */
        .dropdown:hover .dropdown-menu {
            display: block;
        }
       
        /* Password toggle icon alignment */
        .password-input-wrapper {
            position: relative;
            display: flex; /* Use flexbox for vertical alignment */
            align-items: center; /* Center items vertically */
        }
        .password-input-wrapper input {
            flex-grow: 1; /* Allow input to take available space */
            padding-right: 2.5rem; /* Make space for the icon button */
        }
        .password-input-wrapper button {
            position: absolute;
            right: 0;
            top: 50%; /* Center vertically */
            transform: translateY(-50%); /* Adjust for button's own height */
            height: 100%; /* Make button take full height for easier clicking */
            padding: 0 0.75rem; /* Add some padding */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
       
        
    </style>
</head>
<body class="bg-gray-100">

    <!-- Navigation -->
    <!-- Increased z-index to ensure navigation is always on top, even above modals -->
    <nav id="main-navbar" class="bg-gray-900 text-white fixed w-full top-0 z-[1001] shadow-xl fixed top-0 w-full z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3 cursor-pointer">
                    <img src="img/QCseal.jpg" alt="Logo" class="h-16 sm:h-20 rounded-full border-2 border-white">
                    <span class="font-bold text-xl sm:text-2xl tracking-wide">QC ALERTO</span>
                </div>
                
                <div class="hidden md:flex space-x-6 items-center">
                    <a href="#feed" class="text-white font-medium px-3 py-2 rounded-lg hover:bg-gray-700 transition duration-300">Community Feed</a>
                    
                    <a href="#emergency-alerts-section" class="text-white font-medium px-3 py-2 rounded-lg hover:bg-gray-700 transition duration-300">Emergency Alerts</a>
                    <a href="#discuss" class="text-white font-medium px-3 py-2 rounded-lg hover:bg-gray-700 transition duration-300">Discussion</a>
                    <a href="#resources" class="text-white font-medium px-3 py-2 rounded-lg hover:bg-gray-700 transition duration-300">Local Events</a>
                    <a href="#account" class="text-white font-medium px-3 py-2 rounded-lg hover:bg-gray-700 transition duration-300">My Account</a>
                    
                    <!-- Search Bar -->
                    <div class="relative ml-4">
                        <input type="text" placeholder="Search..." class="bg-gray-700 text-white text-sm rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500 w-48 transition duration-300 focus:w-64">
                        <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>

                <div class="hidden md:flex">
                    <button class="open-login-modal bg-green-600 hover:bg-green-700 text-white font-bold px-5 py-2 rounded-full transition duration-300 shadow-md hover:shadow-lg">Sign Up</button>
                </div>
                
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-300 hover:text-white focus:outline-none">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Increased z-index for mobile menu to match navigation bar -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-800 z-[1001] py-2">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#feed" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700 transition duration-300">Community Feed</a>
                
                <a href="#emergency-alerts-section" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700 transition duration-300">Emergency Alerts</a>
                <a href="#discuss" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700 transition duration-300">Discussion</a>
                <a href="#resources" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700 transition duration-300">Local Events</a>
                <a href="#account" class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700 transition duration-300">My Account</a>
                <button class="open-login-modal block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-gray-700 w-full text-left transition duration-300">Sign Up</button>
            </div>
        </div>
    </nav>

    <main id="main-content">
        <header class="relative flex items-center bg-cover bg-center bg-no-repeat h-screen " style="background-image: url('img/qccityhall.jpg');">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
            <div class="container mx-auto px-4 relative z-5 text-center text-white py-16">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold mb-6 drop-shadow-2xl leading-tight">Quezon City Emergency Communication System</h1>
                <p class="text-lg sm:text-xl lg:text-2xl drop-shadow-lg max-w-3xl mx-auto mb-10">The heart of our community, serving the people of Quezon City.</p>
               <a href="#subscribe" class="open-login-modal bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full transition duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">Get Alerts Now</a>
            </div>
        </header>

        <!-- Modals z-index remains at 1000, now below the navigation bar -->
        <div id="welcome-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-[1000] hidden p-4">
            <div class="bg-white rounded-xl shadow-2xl p-6 sm:p-8 max-w-md mx-auto text-center animate-fade-in-up">
                <h2 class="text-2xl sm:text-3xl font-bold mb-4 text-gray-800">Paalam to Your Community Alert System!</h2>
                <p class="mb-6 text-gray-700">Connect with your neighbors and stay informed about local emergencies.</p>
                <button id="close-modal" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-5 rounded-lg transition duration-300">Close</button>
            </div>
        </div>

        <div id="message-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-[1000] hidden p-4">
            <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-sm relative text-center animate-fade-in-up">
                <h3 id="message-modal-title" class="text-xl font-bold mb-4 text-gray-900"></h3>
                <p id="message-modal-content" class="mb-6 text-gray-700"></p>
                <button id="close-message-modal" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">OK</button>
            </div>
        </div>

        <section class="py-16 bg-gray-50 min-h-[calc(100vh-80px)] pt-20">
            <div class="container mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold mb-6 text-gray-800">About Us</h2>
                <p class="text-lg text-gray-700 leading-relaxed max-w-3xl mx-auto">The Emergency Communication System is built to keep the people of Quezon City District 2 informed and safe during emergencies. Whether it’s a typhoon, earthquake, health alert, or public safety concern, the system sends out timely and reliable information through SMS, email, public address systems, and online alerts.</p>
            </div>
        </section>

        <section id="notification" class="py-16 bg-gradient-to-br from-blue-50 to-indigo-100">
            <div class="container mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-extrabold mb-12 text-gray-900">
                  <span class="bg-white py-3 px-6 rounded-full shadow-lg">Community Tools</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white border-2 border-blue-200 p-8 rounded-xl shadow-xl transition-all duration-300 hover:shadow-2xl hover:border-blue-400 transform hover:-translate-y-1 flex flex-col items-center text-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.928-7.903L7 6.586v7.414zm0 0H3m4 0a4 4 0 004 4m4-4a4 4 0 00-4-4m0 12l4-4"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Neighborhood Alerts</h3>
                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full mb-4 font-semibold">NEW!</span>
                        <p class="text-gray-700 leading-relaxed">Receive real-time notifications about local emergencies and community updates directly to your device.</p>
                    </div>
                    <div id="community-chat-feature" class="bg-white border-2 border-blue-200 p-8 rounded-xl shadow-xl transition-all duration-300 hover:shadow-2xl hover:border-blue-400 transform hover:-translate-y-1 flex flex-col items-center text-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Community Chat</h3>
                        <span class="inline-block bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full mb-4 font-semibold">POPULAR!</span>
                        <p class="text-gray-700 leading-relaxed">Engage directly with neighbors to discuss safety concerns, share information, and coordinate efforts.</p>
                    </div>
                    <div id="communication" class="bg-white border-2 border-blue-200 p-8 rounded-xl shadow-xl transition-all duration-300 hover:shadow-2xl hover:border-blue-400 transform hover:-translate-y-1 flex flex-col items-center text-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L4 19V5z"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Resource Sharing</h3>
                        <span class="inline-block bg-purple-100 text-purple-800 text-xs px-3 py-1 rounded-full mb-4 font-semibold">ESSENTIAL!</span>
                        <p class="text-gray-700 leading-relaxed">Easily find and share vital resources like emergency kits, safe shelters, and neighborhood plans.</p>
                    </div>
                    <div id="integration" class="bg-white border-2 border-blue-200 p-8 rounded-xl shadow-xl transition-all duration-300 hover:shadow-2xl hover:border-blue-400 transform hover:-translate-y-1 flex flex-col items-center text-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Automated Warning Integration</h3>
                        <span class="inline-block bg-red-100 text-red-800 text-xs px-3 py-1 rounded-full mb-4 font-semibold">CRITICAL!</span>
                        <p class="text-gray-700 leading-relaxed">Receive critical alerts integrated directly from PAGASA and PHIVOLCS for accurate information.</p>
                    </div>
                    <div id="multilingual" class="bg-white border-2 border-blue-200 p-8 rounded-xl shadow-xl transition-all duration-300 hover:shadow-2xl hover:border-blue-400 transform hover:-translate-y-1 flex flex-col items-center text-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Multilingual Support</h3>
                        <span class="inline-block bg-indigo-100 text-indigo-800 text-xs px-3 py-1 rounded-full mb-4 font-semibold">INCLUSIVE!</span>
                        <p class="text-gray-700 leading-relaxed">Ensure all residents receive vital information in their preferred language for better understanding.</p>
                    </div>
                    <div class="bg-white border-2 border-blue-200 p-8 rounded-xl shadow-xl transition-all duration-300 hover:shadow-2xl hover:border-blue-400 transform hover:-translate-y-1 flex flex-col items-center text-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-blue-800 mb-3">Citizen Subscription</h3>
                        <span class="inline-block bg-teal-100 text-teal-800 text-xs px-3 py-1 rounded-full mb-4 font-semibold">PERSONALIZE!</span>
                        <p class="text-gray-700 leading-relaxed">Customize your alert preferences and notification methods to suit your individual needs and location.</p>
                    </div>
                </div>
               <button class="open-login-modal mt-12 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
        Join Community Network
        </button>
            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="container mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold mb-8 text-gray-800">How It Works</h2>
                <p class="text-lg text-gray-700 mb-10 max-w-2xl mx-auto">Our system operates through a streamlined process to ensure effective communication during emergencies.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1 border border-gray-200">
                        <h3 class="text-2xl font-bold text-blue-700 mb-3">Step 1</h3>
                        <p class="text-gray-700">Alerts are generated based on real-time data from official sources and community reports.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1 border border-gray-200">
                        <h3 class="text-2xl font-bold text-blue-700 mb-3">Step 2</h3>
                        <p class="text-gray-700">Notifications are sent promptly to registered users via multiple communication channels.</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1 border border-gray-200">
                        <h3 class="text-2xl font-bold text-blue-700 mb-3">Step 3</h3>
                        <p class="text-gray-700">Users can respond to alerts and provide valuable feedback through the intuitive interface.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="feed" class="py-16 bg-gray-100">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-center mb-10 text-gray-800">Community Feed</h2>
                <div class="bg-white p-8 rounded-xl shadow-xl border border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-900">Latest Updates from Your Neighborhood</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">Stay informed about what's happening around you. Share your own updates or respond to others.</p>
                    <ul class="list-disc list-inside text-gray-700 space-y-3 pl-5">
                        <li><strong class="text-gray-900">Road Closure:</strong> EDSA due to maintenance, July 20-22. Expect delays.</li>
                        <li><strong class="text-gray-900">Community Event:</strong> Clean-up drive this Saturday at Quezon Memorial Circle. Join us!</li>
                        <li><strong class="text-gray-900">Health Advisory:</strong> New advisory regarding dengue cases in District 2. Please take precautions.</li>
                        <li><strong class="text-gray-900">Lost Pet:</strong> Lost dog in Barangay Holy Spirit - small brown poodle. Please contact if seen.</li>
                        <li><strong class="text-gray-900">Reminder:</strong> Community Potluck this Sunday at the Multipurpose Hall. Bring your favorite dish!</li>
                    </ul>
                    <button class="open-login-modal mt-8 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-5 rounded-full transition duration-300 shadow-md hover:shadow-lg">View All Posts</button>
                </div>
            </div>
        </section>

        <section id="emergency-alerts-section" class="py-16 bg-red-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-center mb-10 text-red-800">Emergency Alerts</h2>
                <div class="space-y-6">
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-6 rounded-lg shadow-md" role="alert">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.3 2.671-1.3 3.436 0L14.473 7.8c.765 1.3-.149 2.9-1.614 2.9H7.141c-1.465 0-2.379-1.6-.149-2.9l4.995-8.501z" clip-rule="evenodd" />
                            </svg>
                            <strong class="font-bold text-xl">CRITICAL: Severe Thunderstorm Warning!</strong>
                        </div>
                        <p class="text-lg">Please seek shelter immediately. Heavy rainfall and strong winds expected in Quezon City. Stay indoors and away from windows.</p>
                    </div>
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-800 p-6 rounded-lg shadow-md" role="alert">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.3 2.671-1.3 3.436 0L14.473 7.8c.765 1.3-.149 2.9-1.614 2.9H7.141c-1.465 0-2.379-1.6-.149-2.9l4.995-8.501z" clip-rule="evenodd" />
                            </svg>
                            <strong class="font-bold text-xl">ADVISORY: Minor Earthquake Detected</strong>
                        </div>
                        <p class="text-lg">A 4.5 magnitude earthquake was detected near Metro Manila. No significant damage reported. Remain vigilant for aftershocks.</p>
                    </div>
                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-800 p-6 rounded-lg shadow-md" role="alert">
                        <div class="flex items-center mb-2">
                            <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.3 2.671-1.3 3.436 0L14.473 7.8c.765 1.3-.149 2.9-1.614 2.9H7.141c-1.465 0-2.379-1.6-.149-2.9l4.995-8.501z" clip-rule="evenodd" />
                            </svg>
                            <strong class="font-bold text-xl">PUBLIC HEALTH: Dengue Advisory</strong>
                        </div>
                        <p class="text-lg">Increased dengue cases in District 2. Please practice "4-S" strategy (Search and Destroy, Self-protection, Seek early consultation, Say yes to fogging). Report suspected cases to local health centers.</p>
                    </div>
                </div>
                <p class="text-center text-gray-700 mt-8 text-lg">For a comprehensive list of all alerts, visit our dedicated alerts page.</p>
                <button class="open-login-modal mt-6 bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 shadow-md hover:shadow-lg block mx-auto">See All Alerts</button>
            </div>
        </section>

        <section id="discuss" class="py-16 bg-gray-100">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-center mb-10 text-gray-800">Community Discussion</h2>
                <div class="bg-white p-8 rounded-xl shadow-xl border border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-900">Engage with Your Neighbors</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">Discuss important community matters, share opinions, and connect with fellow residents on various topics.</p>
                    <ul class="list-disc list-inside text-gray-700 space-y-3 pl-5">
                        <li><strong class="text-gray-900">Topic: Preparing for the Rainy Season</strong> - Share your best tips for flood preparedness!</li>
                        <li><strong class="text-gray-900">Topic: Local Security Concerns</strong> in Brgy. Commonwealth. Share your observations and solutions.</li>
                        <li><strong class="text-gray-900">Topic: Volunteer Opportunities</strong> for disaster preparedness. Let's build a stronger community!</li>
                        <li><strong class="text-gray-900">Topic: Local Government Initiatives</strong> for Community Development. What are your thoughts?</li>
                        <li><strong class="text-gray-900">Topic: New Recycling Programs</strong> in District 2. How can we make it more effective?</li>
                    </ul>
                    <button class="open-login-modal mt-8 bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-5 rounded-full transition duration-300 shadow-md hover:shadow-lg">Join a Discussion</button>
                </div>
            </div>
        </section>

        <section id="resources" class="py-16 bg-blue-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-center mb-10 text-blue-800">Essential Resources</h2>
                <div class="bg-white p-8 rounded-xl shadow-xl border border-blue-200">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-900">Important Information and Guides</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">Access valuable resources for emergency preparedness, safety guides, and local services to keep your family safe.</p>
                    <ul class="list-disc list-inside text-gray-700 space-y-3 pl-5">
                        <li><a href="#" class="text-blue-600 hover:text-blue-800 hover:underline font-medium">Emergency Preparedness Handbook (PDF)</a> - A comprehensive guide for all emergencies.</li>
                        <li><a href="#" class="text-blue-600 hover:text-blue-800 hover:underline font-medium">List of Evacuation Centers in Quezon City</a> - Know your nearest safe locations.</li>
                        <li><a href="#" class="text-blue-600 hover:text-blue-800 hover:underline font-medium">First Aid Basics Guide</a> - Essential skills for immediate response.</li>
                        <li><a href="#contacts" class="text-blue-600 hover:text-blue-800 hover:underline font-medium">Local Emergency Hotlines</a> - Quick access to vital contact numbers.</li>
                        <li><a href="#" class="text-blue-600 hover:text-blue-800 hover:underline font-medium">Comprehensive Emergency Hotlines (PDF)</a> - A downloadable list of all crucial contacts.</li>
                        <li><a href="#" class="text-blue-600 hover:text-blue-800 hover:underline font-medium">Disaster Preparedness Video Series</a> - Visual guides for practical preparedness.</li>
                    </ul>
                    <button class="open-login-modal mt-8 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-5 rounded-full transition duration-300 shadow-md hover:shadow-lg">Explore More Resources</button>
                </div>
            </div>
        </section>

        <section id="events" class="py-16 bg-gray-100">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-center mb-10 text-gray-800">Local Events</h2>
                <div class="bg-white p-8 rounded-xl shadow-xl border border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-900">Upcoming Community Gatherings</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">Discover local events, workshops, and community activities happening in Quezon City.</p>
                    <ul class="list-disc list-inside text-gray-700 space-y-3 pl-5">
                        <li><strong class="text-gray-900">July 25:</strong> Disaster Preparedness Workshop (Q.C. Hall, 9 AM - 12 PM). Learn essential survival skills.</li>
                        <li><strong class="text-gray-900">August 1:</strong> Blood Donation Drive (Eastwood City, 10 AM - 4 PM). Save a life, donate blood!</li>
                        <li><strong class="text-gray-900">August 15:</strong> Neighborhood Watch Meeting (Brgy. Hall, 7 PM). Discuss local security and initiatives.</li>
                        <li><strong class="text-gray-900">August 22:</strong> Barangay Holy Spirit General Assembly (Community Center, 2 PM). Your voice matters!</li>
                        <li><strong class="text-gray-900">September 5:</strong> Tree Planting Activity (La Mesa Eco Park, 8 AM). Help green our city.</li>
                    </ul>
                    <button class="open-login-modal mt-8 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-5 rounded-full transition duration-300 shadow-md hover:shadow-lg">View Event Calendar</button>
                </div>
            </div>
        </section>

        <section id="account" class="py-16 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-center mb-10 text-gray-800">My Account</h2>
                <div class="bg-white p-8 rounded-xl shadow-xl border border-gray-200 text-center">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-900">Manage Your Profile and Preferences</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">Update your personal information, communication preferences, and notification settings for a personalized experience. Here you can:</p>
                    <ul class="list-disc list-inside text-gray-700 space-y-3 mb-8 pl-5 max-w-xl mx-auto text-left">
                        <li>Edit your profile information (name, address, contact details).</li>
                        <li>Change your password for enhanced security.</li>
                        <li>Customize which types of alerts you receive (e.g., weather, public safety, health).</li>
                        <li>Choose your preferred notification method (SMS, email, in-app).</li>
                        <li>View your activity log and past alerts.</li>
                    </ul>
                    <button class="open-login-modal bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 shadow-lg hover:shadow-xl">Go to My Account</button>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-200">
            <div class="container mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold mb-8 text-gray-800">Screenshots</h2>
                <img src="img/QCcircle.jpg" alt="Demo Preview" class="rounded-xl shadow-2xl mx-auto mb-6 max-w-full h-auto">
                <p class="text-lg text-gray-700">A preview of the Emergency Communication System interface, designed for clarity and ease of use.</p>
            </div>
        </section>

        <section class="py-16 bg-blue-900 text-white">
            <div class="container mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold mb-8 text-white">Why Choose Us?</h2>
                <p class="text-lg text-blue-100 mb-12 max-w-3xl mx-auto">
                    We are committed to ensuring every resident of Quezon City receives timely, accurate, and reliable emergency alerts. Here’s what makes us stand out:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white bg-opacity-10 shadow-lg p-8 rounded-xl backdrop-blur-sm border border-blue-700 flex flex-col items-center">
                        <svg class="w-16 h-16 text-blue-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-blue-200 mb-3">Real-Time Notifications</h3>
                        <p class="text-blue-100 text-center">Get alerts instantly via SMS, email, and PA systems when every second matters, ensuring rapid response.</p>
                    </div>
                    <div class="bg-white bg-opacity-10 shadow-lg p-8 rounded-xl backdrop-blur-sm border border-blue-700 flex flex-col items-center">
                        <svg class="w-16 h-16 text-blue-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.001 12.001 0 002.928 12c0 3.072 1.407 5.869 3.615 7.728A12.002 12.002 0 0012 21.054c3.159 0 6.026-1.42 7.928-3.629A12.001 12.001 0 0021.072 12V3.984z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-blue-200 mb-3">Government Verified</h3>
                        <p class="text-blue-100 text-center">Our alerts are sourced directly from official agencies like PAGASA and PHIVOLCS, ensuring accuracy.</p>
                    </div>
                    <div class="bg-white bg-opacity-10 shadow-lg p-8 rounded-xl backdrop-blur-sm border border-blue-700 flex flex-col items-center">
                        <svg class="w-16 h-16 text-blue-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H2v-2a4 4 0 014-4h2.5M11 12h1a4 4 0 100-8H11v8zm-4.707-3.293a1 1 0 00-1.414-1.414L2 10.586V12h2.586l2.707-2.707z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-blue-200 mb-3">Community Focused</h3>
                        <p class="text-blue-100 text-center">Designed to serve and protect the citizens of Quezon City, with inclusive multilingual support for all.</p>
                    </div>
                </div>
            </div>
        </section>

      <section id="contacts" class="py-16 bg-blue-800 text-blue-800 ">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-center mb-12 text-white">Emergency Contacts</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white bg-opacity-15 rounded-xl p-6 sm:p-8 backdrop-blur-sm shadow-xl flex flex-col items-center text-center">
                        <h3 class="text-2xl font-bold mb-4">Police Department</h3>
                        <div class="space-y-3 text-lg">
                            <p class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                911 / 117 (Emergency)
                            </p>
                            <p class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                (02) 8922-6395 (District 2 HQ)
                            </p>
                            <p class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                Camp Karingal, Quezon City
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-15 rounded-xl p-6 sm:p-8 backdrop-blur-sm shadow-xl flex flex-col items-center text-center">
                        <h3 class="text-2xl font-bold mb-4">Fire Department</h3>
                        <div class="space-y-3 text-lg">
                            <p class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                911 / 16016 (Emergency)
                            </p>
                            <p class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                (02) 8926-2318 (District 2 Station)
                            </p>
                            <p class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                Fire Station 6, Tandang Sora Ave.
                            </p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-15 rounded-xl p-6 sm:p-8 backdrop-blur-sm shadow-xl flex flex-col items-center text-center">
                        <h3 class="text-2xl font-bold mb-4">Medical Services</h3>
                        <div class="space-y-3 text-lg">
                            <p class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                911 / 143 (Emergency)
                            </p>
                            <p class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                (02) 8928-3501 (Quezon City General Hospital)
                            </p>
                            <p class="flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                Quezon City General Hospital, District 2
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-900 text-white py-8" >
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between items-start md:items-center">
                <div class="flex-shrink-0">
                    <div class="flex items-center">
                        <img src="img/QCseal.jpg" alt="Logo" class="h-10 mr-4 rounded-full border border-gray-700" />
                        <div>
                            <h3 class="font-bold text-xl">Emergency Communication System</h3>
                            <p class="text-sm text-gray-400 mt-1">Your safety is our priority.</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col space-y-4 md:flex-row md:space-x-8 md:space-y-0 text-gray-400">
                    <a href="#" class="hover:text-white transition duration-200">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition duration-200">Terms of Service</a>
                    <a href="#" class="hover:text-white transition duration-200">Contact Us</a>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t border-gray-700">
                <p class="text-center text-sm text-gray-500">© 2025  Group 36 Emergency Communication System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Modals z-index remains at 1000, now below the navigation bar -->
    <div id="login-modal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-[1000] hidden p-4">
        <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-sm relative transform transition-all duration-300 scale-100 opacity-100 animate-fade-in-up">
            <button id="close-login-modal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-3xl font-bold">&times;</button>
            <h2 class="text-3xl font-bold text-gray-900 mb-7 text-center">Login to QC ALERTO</h2>
            <form id="login-form">
                <div class="mb-5">
                    <label for="username" class="block text-gray-700 text-sm font-semibold mb-2">Username or Email</label>
                    <input type="text" id="username" name="username" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Enter your username or email" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                    <div class="password-input-wrapper"> <!-- Added wrapper for alignment -->
                        <input type="password" id="password" name="password" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Enter your password" required>
                        <button type="button" id="togglePassword" class="text-gray-600 focus:outline-none">
                            <span id="eyeOpen" class="hidden text-xl">👁️</span>
                            <span id="eyeClosed" class="text-xl">👁️‍🗨️</span>
                        </button>
                    </div>
                    <a href="#" id="open-forgot-password-modal" class="inline-block align-baseline font-bold text-sm text-green-600 hover:text-green-800 float-right mt-3 transition duration-200">Forgot Password?</a>
                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg w-full focus:outline-none focus:shadow-outline transition duration-200 shadow-md">Sign In</button>
            </form>
            <p class="text-center text-gray-600 text-sm mt-6">
                Don't have an account? <a href="#" id="open-register-modal-from-login" class="font-bold text-green-600 hover:text-green-800 transition duration-200">Sign up here</a>.
            </p>
        </div>
    </div>

    <div id="register-modal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-[1000] hidden p-4">
        <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-sm relative animate-fade-in-up">
            <button id="close-register-modal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-3xl font-bold">&times;</button>
            <h2 class="text-3xl font-bold text-gray-900 mb-7 text-center">Register for QC ALERTO</h2>
            <form id="register-form">
                <div class="mb-4">
                    <label for="reg-username" class="block text-gray-700 text-sm font-semibold mb-2">Username</label>
                    <input type="text" id="reg-username" name="reg-username" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Choose a username" required>
                </div>
                <div class="mb-4">
                    <label for="reg-email" class="block text-gray-700 text-sm font-semibold mb-2">Email Address</label>
                    <input type="email" id="reg-email" name="reg-email" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Enter your email" required>
                </div>
                <div class="mb-4">
                    <label for="reg-password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                    <div class="password-input-wrapper"> <!-- Added wrapper for alignment -->
                        <input type="password" id="reg-password" name="reg-password" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Create a password" required>
                        <button type="button" id="toggleRegPassword" class="text-gray-600 focus:outline-none">
                            <span id="eyeOpenReg" class="hidden text-xl">👁️</span>
                            <span id="eyeClosedReg" class="text-xl">👁️‍🗨️</span>
                        </button>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="reg-confirm-password" class="block text-gray-700 text-sm font-semibold mb-2">Confirm Password</label>
                    <div class="password-input-wrapper"> <!-- Added wrapper for alignment -->
                        <input type="password" id="reg-confirm-password" name="reg-confirm-password" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Confirm your password" required>
                        <button type="button" id="toggleRegConfirmPassword" class="text-gray-600 focus:outline-none">
                            <span id="eyeOpenRegConfirm" class="hidden text-xl">👁️</span>
                            <span id="eyeClosedRegConfirm" class="text-xl">👁️‍🗨️</span>
                        </button>
                    </div>
                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg w-full focus:outline-none focus:shadow-outline transition duration-200 shadow-md">Register</button>
            </form>
            <p class="text-center text-gray-600 text-sm mt-6">
                Already have an account? <a href="#" id="open-login-modal-from-register" class="font-bold text-blue-600 hover:text-blue-800 transition duration-200">Login here</a>.
            </p>
        </div>
    </div>

    <div id="forgot-password-modal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-[1000] hidden p-4">
        <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-sm relative animate-fade-in-up">
            <button id="close-forgot-password-modal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-3xl font-bold">&times;</button>
            <h2 class="text-3xl font-bold text-gray-900 mb-7 text-center">Reset Password</h2>
            <form id="forgot-password-form">
                <div class="mb-4">
                    <p class="block text-gray-700 text-sm font-semibold mb-2">How do you want to reset your password?</p>
                    <div class="mt-2 flex space-x-6">
                        <label class="inline-flex items-center">
                            <input type="radio" name="reset-method" value="email" class="form-radio text-blue-600 h-5 w-5" checked>
                            <span class="ml-2 text-gray-700">Email</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="reset-method" value="mobile" class="form-radio text-blue-600 h-5 w-5">
                            <span class="ml-2 text-gray-700">Mobile Number</span>
                        </label>
                    </div>
                </div>
                <div id="email-recovery-field" class="mb-5">
                    <label for="forgot-email" class="block text-gray-700 text-sm font-semibold mb-2">Enter your Email Address</label>
                    <input type="email" id="forgot-email" name="forgot-email" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="your.email@example.com">
                </div>
                <div id="mobile-recovery-field" class="mb-5 hidden">
                    <label for="forgot-mobile" class="block text-gray-700 text-sm font-semibold mb-2">Enter your Mobile Number</label>
                    <input type="tel" id="forgot-mobile" name="forgot-mobile" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-800 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="+63XXXXXXXXXX">
                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg w-full focus:outline-none focus:shadow-outline transition duration-200 shadow-md">Send Reset Link</button>
            </form>
            <p class="text-center text-gray-600 text-sm mt-6">
                Remember your password? <a href="#" id="open-login-modal-from-forgot-password" class="font-bold text-blue-600 hover:text-blue-800 transition duration-200">Login here</a>.
            </p>
        </div>
    </div>

   <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mainNavbar = document.getElementById('main-navbar');
            // Changed from mainContent to document.body
            const bodyElement = document.body; 

            // Function to set body padding-top based on navbar height
            function setBodyPadding() {
                if (mainNavbar && bodyElement) {
                    bodyElement.style.paddingTop = mainNavbar.offsetHeight + 'px';
                }
            }

            // Set padding initially
            setBodyPadding();

            // Recalculate padding on window resize
            window.addEventListener('resize', setBodyPadding);

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                // Recalculate padding after mobile menu state changes
                setBodyPadding(); 
            });

            const openLoginModalBtns = document.querySelectorAll('.open-login-modal');
            const loginModal = document.getElementById('login-modal');
            const closeLoginModalBtn = document.getElementById('close-login-modal');

            const openRegisterModalFromLogin = document.getElementById('open-register-modal-from-login');
            const openLoginModalFromRegister = document.getElementById('open-login-modal-from-register'); 
            const registerModal = document.getElementById('register-modal');
            const closeRegisterModalBtn = document.getElementById('close-register-modal');
            const registerForm = document.getElementById('register-form');

            const openForgotPasswordModal = document.getElementById('open-forgot-password-modal');
            const forgotPasswordModal = document.getElementById('forgot-password-modal');
            const closeForgotPasswordModalBtn = document.getElementById('close-forgot-password-modal');
            const forgotPasswordForm = document.getElementById('forgot-password-form');
            const openLoginModalFromForgotPassword = document.getElementById('open-login-modal-from-forgot-password');

            const resetMethodRadios = document.querySelectorAll('input[name="reset-method"]');
            const emailRecoveryField = document.getElementById('email-recovery-field');
            const mobileRecoveryField = document.getElementById('mobile-recovery-field');
            const forgotEmailInput = document.getElementById('forgot-email');
            const forgotMobileInput = document.getElementById('forgot-mobile');

            const passwordInput = document.getElementById('password');
            const togglePasswordBtn = document.getElementById('togglePassword');
            const eyeOpenIcon = document.getElementById('eyeOpen');
            const eyeClosedIcon = document.getElementById('eyeClosed');

            const regPasswordInput = document.getElementById('reg-password');
            const toggleRegPasswordBtn = document.getElementById('toggleRegPassword');
            const eyeOpenRegIcon = document.getElementById('eyeOpenReg');
            const eyeClosedRegIcon = document.getElementById('eyeClosedReg');

            const regConfirmPasswordInput = document.getElementById('reg-confirm-password');
            const toggleRegConfirmPasswordBtn = document.getElementById('toggleRegConfirmPassword');
            const eyeOpenRegConfirmIcon = document.getElementById('eyeOpenRegConfirm');
            const eyeClosedRegConfirmIcon = document.getElementById('eyeClosedRegConfirm');

            const messageModal = document.getElementById('message-modal');
            const messageModalTitle = document.getElementById('message-modal-title');
            const messageModalContent = document.getElementById('message-modal-content');
            const closeMessageModalBtn = document.getElementById('close-message-modal');

            function showMessage(title, message) {
                messageModalTitle.textContent = title;
                messageModalContent.textContent = message;
                messageModal.classList.remove('hidden');
            }

            closeMessageModalBtn.addEventListener('click', () => {
                messageModal.classList.add('hidden');
            });

            messageModal.addEventListener('click', (e) => {
                if (e.target === messageModal) {
                    messageModal.classList.add('hidden');
                }
            });

            openLoginModalBtns.forEach(button => {
                button.addEventListener('click', () => {
                    loginModal.classList.remove('hidden');
                });
            });

            closeLoginModalBtn.addEventListener('click', () => {
                loginModal.classList.add('hidden');
            });

            loginModal.addEventListener('click', (e) => {
                if (e.target === loginModal) {
                    loginModal.classList.add('hidden');
                }
            });

            document.getElementById('login-form').addEventListener('submit', async (e) => {
                e.preventDefault();

                const username = document.getElementById('username').value;
                const password = document.getElementById('password').value;

                try {
                    const response = await fetch('login.php', { 
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ username, password })
                    });

                    if (!response.ok) {
                        const errorText = await response.text();
                        console.error('Server error response:', errorText);
                        showMessage('Login Failed', `Server responded with status ${response.status}. Check console for details.`);
                        return;
                    }

                    const contentType = response.headers.get('content-type');
                    if (!contentType || !contentType.includes('application/json')) {
                        const errorText = await response.text();
                        console.error('Expected JSON, but received:', errorText);
                        showMessage('Login Failed', 'Unexpected response from server. Check console for details.');
                        return;
                    }

                    const result = await response.json();

                    if (result.success) {
                        showMessage('Login Successful', `Welcome, ${result.user.username}!`);
                        loginModal.classList.add('hidden');
                    } else {
                        showMessage('Login Failed', result.message);
                    }
                } catch (error) {
                    console.error('Error during login:', error);
                    showMessage('Error', 'An error occurred during login. Please try again.');
                }
            });

            openRegisterModalFromLogin.addEventListener('click', (e) => {
                e.preventDefault(); 
                loginModal.classList.add('hidden'); 
                registerModal.classList.remove('hidden'); 
            });

            closeRegisterModalBtn.addEventListener('click', () => {
                registerModal.classList.add('hidden');
            });

            registerModal.addEventListener('click', (e) => {
                if (e.target === registerModal) {
                    registerModal.classList.add('hidden');
                }
            });

            registerForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                const regUsername = document.getElementById('reg-username').value;
                const regEmail = document.getElementById('reg-email').value;
                const regPassword = document.getElementById('reg-password').value;
                const regConfirmPassword = document.getElementById('reg-confirm-password').value;

                try {
                    const response = await fetch('register.php', { 
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            username: regUsername,
                            email: regEmail,
                            password: regPassword,
                            confirm_password: regConfirmPassword
                        })
                    });

                    if (!response.ok) {
                        const errorText = await response.text();
                        console.error('Server error response:', errorText);
                        showMessage('Registration Failed', `Server responded with status ${response.status}. Check console for details.`);
                        return;
                    }

                    const contentType = response.headers.get('content-type');
                    if (!contentType || !contentType.includes('application/json')) {
                        const errorText = await response.text();
                        console.error('Expected JSON, but received:', errorText);
                        showMessage('Registration Failed', 'Unexpected response from server. Check console for details.');
                        return;
                    }

                    const result = await response.json();

                    if (result.success) {
                        showMessage('Registration Successful', result.message);
                        registerModal.classList.add('hidden');
                        document.getElementById('login-modal').classList.remove('hidden');
                        registerForm.reset();
                    } else {
                        showMessage('Registration Failed', result.message);
                    }
                } catch (error) {
                    console.error('Error during registration:', error);
                    showMessage('Error', 'An error occurred during registration. Please try again.');
                }
            });

            openLoginModalFromRegister.addEventListener('click', (e) => {
                e.preventDefault();
                registerModal.classList.add('hidden');
                loginModal.classList.remove('hidden');
            });

            openForgotPasswordModal.addEventListener('click', (e) => {
                e.preventDefault(); 
                loginModal.classList.add('hidden'); 
                forgotPasswordModal.classList.remove('hidden'); 
                document.querySelector('input[name="reset-method"][value="email"]').checked = true;
                emailRecoveryField.classList.remove('hidden');
                mobileRecoveryField.classList.add('hidden');
                forgotEmailInput.value = '';
                forgotMobileInput.value = '';
            });

            closeForgotPasswordModalBtn.addEventListener('click', () => {
                forgotPasswordModal.classList.add('hidden');
            });

            forgotPasswordModal.addEventListener('click', (e) => {
                if (e.target === forgotPasswordModal) {
                    forgotPasswordModal.classList.add('hidden');
                }
            });

            resetMethodRadios.forEach(radio => {
                radio.addEventListener('change', () => {
                    if (radio.value === 'email') {
                        emailRecoveryField.classList.remove('hidden');
                        mobileRecoveryField.classList.add('hidden');
                        forgotMobileInput.value = '';
                        forgotEmailInput.setAttribute('required', 'true');
                        forgotMobileInput.removeAttribute('required');
                    } else {
                        emailRecoveryField.classList.add('hidden');
                        mobileRecoveryField.classList.remove('hidden');
                        forgotEmailInput.value = '';
                        forgotMobileInput.setAttribute('required', 'true');
                        forgotEmailInput.removeAttribute('required');
                    }
                });
            });

            forgotEmailInput.setAttribute('required', 'true');

            forgotPasswordForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const selectedMethod = document.querySelector('input[name=\"reset-method\"]:checked').value;
                let recoveryValue = '';

                if (selectedMethod === 'email') {
                    recoveryValue = forgotEmailInput.value;
                    if (recoveryValue) {
                        showMessage('Password Reset', `Password reset requested for email: ${recoveryValue}. Check your email for instructions.`);
                    } else {
                        showMessage('Input Required', 'Please enter your email address.');
                        return; 
                    }
                } else {
                    recoveryValue = forgotMobileInput.value;
                    if (recoveryValue) {
                        showMessage('Input Required', 'Please enter your mobile number.');
                        return;
                    }
                }
                forgotPasswordModal.classList.add('hidden');
            });

            openLoginModalFromForgotPassword.addEventListener('click', (e) => {
                e.preventDefault();
                forgotPasswordModal.classList.add('hidden');
                loginModal.classList.remove('hidden');
            });

            function togglePasswordVisibility(inputElement, openIconElement, closedIconElement) {
                if (inputElement.type === 'password') {
                    inputElement.type = 'text'; 
                    openIconElement.classList.remove('hidden'); 
                    closedIconElement.classList.add('hidden'); 
                } else {
                    inputElement.type = 'password'; 
                    openIconElement.classList.add('hidden'); 
                    closedIconElement.classList.remove('hidden'); 
                }
            }

            if (togglePasswordBtn) {
                togglePasswordBtn.addEventListener('click', () => {
                    togglePasswordVisibility(passwordInput, eyeOpenIcon, eyeClosedIcon);
                });
            }
            if (toggleRegPasswordBtn) {
                toggleRegPasswordBtn.addEventListener('click', () => {
                    togglePasswordVisibility(regPasswordInput, eyeOpenRegIcon, eyeClosedRegIcon);
                });
            }
            if (toggleRegConfirmPasswordBtn) {
                toggleRegConfirmPasswordBtn.addEventListener('click', () => {
                    togglePasswordVisibility(regConfirmPasswordInput, eyeOpenRegConfirmIcon, eyeClosedRegConfirmIcon);
                });
            }
        });
    </script>

</body>
</html>
