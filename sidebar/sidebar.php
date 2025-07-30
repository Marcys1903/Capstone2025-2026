<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Inter", sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox to lay out sidebar and content */
            min-height: 100vh;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
        }
    </style>
</head>
<body class="bg-gray-100">

    <?php
    // Get the current page from the URL query parameter
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

    // Define which pages belong to the 'Mass Notification' submenu
    $massNotificationPages = [
        'message_composer',
        'channel_selector',
        'recipient_group_manager',
        'delivery_status_tracker',
        'priority_broadcast_controller'
    ];

    // Define which pages belong to the 'Alert Categories' submenu
    $alertCategoriesPages = [
        'event_type_classifier',
        'severity_level_assigner',
        'location_based_categorization',
        'incident_validation_interface',
        'predefined_alert_templates'
    ];

    // Define which pages belong to the 'Two-Way Comms' submenu
    $twoWayCommsPages = [
        'user_feedback_collector',
        'incident_reporting_module',
        'live_chat_gateway',
        'auto_responder_engine',
        'escalation_trigger_system'
    ];

    // Define which pages belong to the 'Auto Warnings' submenu
    $autoWarningsPages = [
        'apiconnectormodule',
        'dataparserformatter',
        'eventmatchingengine',
        'feedhealthmonitor',
        'realtimealerttrigger'
    ];

    // Define which pages belong to the 'Multilingual' submenu
    $multilingualPages = [
        'languagepreferencemanager',
        'aipoweredtranslator',
        'culturalcontextadjuster',
        'voicetranslationengine',
        'languagefallbackhandler'
    ];

    // Define which pages belong to the 'Users' submenu (UPDATED: No pages here, removed toggle functionality)
    $usersPages = [];

    // Define which pages belong to the 'Subscriptions' submenu
    $subscriptionsPages = [
        'userregistrationmodule',
        'interestbasedalertsettings',
        'geofencemanager',
        'contactchannelselector',
        'optinoptoutcontrolpanel'
    ];

    // Define which pages belong to the 'Audit Log' submenu
    $auditLogPages = [
        'messagedeliverylogger',
        'adminactiontracker',
        'userresponselog',
        'systemerrormonitor',
        'auditreportgenerator'
    ];


    // Check if the current page is one of the mass notification pages
    $isMassNotificationSubmenuActive = in_array($currentPage, $massNotificationPages);
    // Check if the current page is one of the alert categories pages
    $isAlertCategoriesSubmenuActive = in_array($currentPage, $alertCategoriesPages);
    // Check if the current page is one of the two-way comms pages
    $isTwoWayCommsSubmenuActive = in_array($currentPage, $twoWayCommsPages);
    // Check if the current page is one of the auto warnings pages
    $isAutoWarningsSubmenuActive = in_array($currentPage, $autoWarningsPages);
    // Check if the current page is one of the multilingual pages
    $isMultilingualSubmenuActive = in_array($currentPage, $multilingualPages);
    // Check if the current page is one of the users pages (always false now for toggle purposes)
    $isUsersSubmenuActive = false; // Force to false as it's no longer a toggling menu
    // Check if the current page is one of the subscriptions pages
    $isSubscriptionsSubmenuActive = in_array($currentPage, $subscriptionsPages);
    // Check if the current page is one of the audit log pages
    $isAuditLogSubmenuActive = in_array($currentPage, $auditLogPages);


    // Set classes and data attributes based on the active state for Mass Notification
    $massNotificationToggleState = $isMassNotificationSubmenuActive ? 'open' : 'closed';
    $massNotificationSubmenuHiddenClass = $isMassNotificationSubmenuActive ? '' : 'hidden';

    // Set classes and data attributes based on the active state for Alert Categories
    $alertCategoriesToggleState = $isAlertCategoriesSubmenuActive ? 'open' : 'closed';
    $alertCategoriesSubmenuHiddenClass = $isAlertCategoriesSubmenuActive ? '' : 'hidden';

    // Set classes and data attributes based on the active state for Two-Way Comms
    $twoWayCommsToggleState = $isTwoWayCommsSubmenuActive ? 'open' : 'closed';
    $twoWayCommsSubmenuHiddenClass = $isTwoWayCommsSubmenuActive ? '' : 'hidden';

    // Set classes and data attributes based on the active state for Auto Warnings
    $autoWarningsToggleState = $isAutoWarningsSubmenuActive ? 'open' : 'closed';
    $autoWarningsSubmenuHiddenClass = $isAutoWarningsSubmenuActive ? '' : 'hidden';

    // Set classes and data attributes based on the active state for Multilingual
    $multilingualToggleState = 'closed'; // No longer a toggling menu
    $multilingualSubmenuHiddenClass = 'hidden'; // Always hidden

    // Set classes and data attributes based on the active state for Users (always closed as it's not a toggle)
    $usersToggleState = 'closed';
    $usersSubmenuHiddenClass = 'hidden';

    // Set classes and data attributes based on the active state for Subscriptions
    $subscriptionsToggleState = $isSubscriptionsSubmenuActive ? 'open' : 'closed';
    $subscriptionsSubmenuHiddenClass = $isSubscriptionsSubmenuActive ? '' : 'hidden';

    // Set classes and data attributes based on the active state for Audit Log
    $auditLogToggleState = $isAuditLogSubmenuActive ? 'open' : 'closed';
    $auditLogSubmenuHiddenClass = $isAuditLogSubmenuActive ? '' : 'hidden';
    ?>

    <div id="sidebar" class="w-64 bg-gray-900 shadow-xl p-6 flex flex-col h-screen overflow-y-auto custom-scrollbar flex-shrink-0 scroll-smooth">

        <div class="mb-8 text-2xl font-bold text-white flex items-center justify-center">
            <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
           Administrator
        </div>

        <nav class="flex-grow">
            <ul>
                <li class="mb-3">
                    <a href="../maincontents/index.php?page=dashboard" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center
                        <?php echo ($currentPage == 'dashboard') ? 'bg-gray-700 text-white' : ''; ?>">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200 <?php echo ($currentPage == 'dashboard') ? 'text-white' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 001 1h3m-6-10v10a1 1 0 001 1h3"></path>
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>

                <li class="mb-3">
                    <div class="relative">
                        <a href="#" id="mass-notification-toggle" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center justify-between
                            <?php echo $isMassNotificationSubmenuActive ? 'bg-gray-700 text-white' : ''; ?>"
                            data-state="<?php echo $massNotificationToggleState; ?>">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200 <?php echo $isMassNotificationSubmenuActive ? 'text-white' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592L2 13V7a2 2 0 012-2h7zm0 13.358l2.757 3.322c.1.12.2.22.3.3h1.34c.16 0 .3-.07.4-.18l2.7-3.21a2 2 0 00.5-1.57V7a2 2 0 00-2-2h-7z"></path>
                                </svg>
                                <span class="font-medium">Mass Notification</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-white transform transition-transform duration-200 <?php echo $isMassNotificationSubmenuActive ? 'rotate-90' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <ul id="mass-notification-submenu" class="ml-6 mt-2 space-y-2 <?php echo $massNotificationSubmenuHiddenClass; ?>">
                            <li>
                                <a href="../maincontents/index.php?page=message_composer" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'message_composer') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'message_composer') ? 'bg-white' : ''; ?>"></span>
                                    Message Composer
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=channel_selector" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'channel_selector') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'channel_selector') ? 'bg-white' : ''; ?>"></span>
                                    Channel Selector
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=recipient_group_manager" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'recipient_group_manager') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'recipient_group_manager') ? 'bg-white' : ''; ?>"></span>
                                    Recipient Group Manager
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=delivery_status_tracker" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'delivery_status_tracker') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'delivery_status_tracker') ? 'bg-white' : ''; ?>"></span>
                                    Delivery Status Tracker
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=priority_broadcast_controller" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'priority_broadcast_controller') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'priority_broadcast_controller') ? 'bg-white' : ''; ?>"></span>
                                    Priority Broadcast Controller
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="mb-3">
                    <div class="relative">
                        <a href="#" id="alert-categories-toggle" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center justify-between
                            <?php echo $isAlertCategoriesSubmenuActive ? 'bg-gray-700 text-white' : ''; ?>"
                            data-state="<?php echo $alertCategoriesToggleState; ?>">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200 <?php echo $isAlertCategoriesSubmenuActive ? 'text-white' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16L2 12l4-4"></path>
                                </svg>
                                <span class="font-medium">Alert Categories</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-white transform transition-transform duration-200 <?php echo $isAlertCategoriesSubmenuActive ? 'rotate-90' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <ul id="alert-categories-submenu" class="ml-6 mt-2 space-y-2 <?php echo $alertCategoriesSubmenuHiddenClass; ?>">
                            <li>
                                <a href="../maincontents/index.php?page=event_type_classifier" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'event_type_classifier') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'event_type_classifier') ? 'bg-white' : ''; ?>"></span>
                                    Event Type Classifier
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=severity_level_assigner" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'severity_level_assigner') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'severity_level_assigner') ? 'bg-white' : ''; ?>"></span>
                                    Severity Level Assigner
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=location_based_categorization" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'location_based_categorization') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'location_based_categorization') ? 'bg-white' : ''; ?>"></span>
                                    Location-Based Categorization
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=incident_validation_interface" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'incident_validation_interface') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'incident_validation_interface') ? 'bg-white' : ''; ?>"></span>
                                    Incident Validation Interface
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=predefined_alert_templates" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'predefined_alert_templates') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'predefined_alert_templates') ? 'bg-white' : ''; ?>"></span>
                                    Predefined Alert Templates
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="mb-3">
                    <div class="relative">
                        <a href="#" id="two-way-comms-toggle" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center justify-between
                            <?php echo $isTwoWayCommsSubmenuActive ? 'bg-gray-700 text-white' : ''; ?>"
                            data-state="<?php echo $twoWayCommsToggleState; ?>">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200 <?php echo $isTwoWayCommsSubmenuActive ? 'text-white' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.24-.963A4.002 4.002 0 004 20h-.003c-1.112-.6-2.03-1.602-2.5-2.884l-.396-.653c-.12-.19-.224-.39-.307-.601C1.042 15.657 1 14.86 1 14V10c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <span class="font-medium">Two-Way Comms</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-white transform transition-transform duration-200 <?php echo $isTwoWayCommsSubmenuActive ? 'rotate-90' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <ul id="two-way-comms-submenu" class="ml-6 mt-2 space-y-2 <?php echo $twoWayCommsSubmenuHiddenClass; ?>">
                            <li>
                                <a href="../maincontents/index.php?page=user_feedback_collector" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'user_feedback_collector') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'user_feedback_collector') ? 'bg-white' : ''; ?>"></span>
                                    User Feedback Collector
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=incident_reporting_module" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'incident_reporting_module') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'incident_reporting_module') ? 'bg-white' : ''; ?>"></span>
                                    Incident Reporting Module
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=live_chat_gateway" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'live_chat_gateway') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'live_chat_gateway') ? 'bg-white' : ''; ?>"></span>
                                    Live Chat Gateway
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=auto_responder_engine" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'auto_responder_engine') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'auto_responder_engine') ? 'bg-white' : ''; ?>"></span>
                                    Auto-Responder Engine
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=escalation_trigger_system" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'escalation_trigger_system') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'escalation_trigger_system') ? 'bg-white' : ''; ?>"></span>
                                    Escalation Trigger System
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="mb-3">
                    <div class="relative">
                        <a href="#" id="auto-warnings-toggle" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center justify-between
                            <?php echo $isAutoWarningsSubmenuActive ? 'bg-gray-700 text-white' : ''; ?>"
                            data-state="<?php echo $autoWarningsToggleState; ?>">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200 <?php echo $isAutoWarningsSubmenuActive ? 'text-white' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <span class="font-medium">Auto Warnings</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-white transform transition-transform duration-200 <?php echo $isAutoWarningsSubmenuActive ? 'rotate-90' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <ul id="auto-warnings-submenu" class="ml-6 mt-2 space-y-2 <?php echo $autoWarningsSubmenuHiddenClass; ?>">
                            <li>
                                <a href="../maincontents/index.php?page=apiconnectormodule" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'apiconnectormodule') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'apiconnectormodule') ? 'bg-white' : ''; ?>"></span>
                                    API Connector Module
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=dataparserformatter" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'dataparserformatter') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'dataparserformatter') ? 'bg-white' : ''; ?>"></span>
                                    Data Parser & Formatter
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=eventmatchingengine" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'eventmatchingengine') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'eventmatchingengine') ? 'bg-white' : ''; ?>"></span>
                                    Event Matching Engine
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=feedhealthmonitor" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'feedhealthmonitor') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'feedhealthmonitor') ? 'bg-white' : ''; ?>"></span>
                                    Feed Health Monitor
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=realtimealerttrigger" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'realtimealerttrigger') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'realtimealerttrigger') ? 'bg-white' : ''; ?>"></span>
                                    Real-time Alert Trigger
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="mb-3">
                    <div class="relative">
                        <a href="#" id="multilingual-toggle" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center justify-between
                            <?php echo $isMultilingualSubmenuActive ? 'bg-gray-700 text-white' : ''; ?>"
                            data-state="<?php echo $multilingualToggleState; ?>">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200 <?php echo $isMultilingualSubmenuActive ? 'text-white' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                                </svg>
                                <span class="font-medium">Multilingual</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-white transform transition-transform duration-200 <?php echo $isMultilingualSubmenuActive ? 'rotate-90' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <ul id="multilingual-submenu" class="ml-6 mt-2 space-y-2 <?php echo $multilingualSubmenuHiddenClass; ?>">
                            <li>
                                <a href="../maincontents/index.php?page=languagepreferencemanager" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'languagepreferencemanager') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'languagepreferencemanager') ? 'bg-white' : ''; ?>"></span>
                                    Language Preferences
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=aipoweredtranslator" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'aipoweredtranslator') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'aipoweredtranslator') ? 'bg-white' : ''; ?>"></span>
                                    AI-Powered Translator
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=culturalcontextadjuster" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'culturalcontextadjuster') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'culturalcontextadjuster') ? 'bg-white' : ''; ?>"></span>
                                    Cultural Context Adjuster
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=voicetranslationengine" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'voicetranslationengine') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'voicetranslationengine') ? 'bg-white' : ''; ?>"></span>
                                    Voice Translation Engine
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=languagefallbackhandler" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'languagefallbackhandler') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'languagefallbackhandler') ? 'bg-white' : ''; ?>"></span>
                                    Language Fallback Handler
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="mb-3">
                    <div class="relative">
                        <a href="#" id="subscriptions-toggle" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center justify-between
                            <?php echo $isSubscriptionsSubmenuActive ? 'bg-gray-700 text-white' : ''; ?>"
                            data-state="<?php echo $subscriptionsToggleState; ?>">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200 <?php echo $isSubscriptionsSubmenuActive ? 'text-white' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                                <span class="font-medium">Subscriptions</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-white transform transition-transform duration-200 <?php echo $isSubscriptionsSubmenuActive ? 'rotate-90' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <ul id="subscriptions-submenu" class="ml-6 mt-2 space-y-2 <?php echo $subscriptionsSubmenuHiddenClass; ?>">
                            <li>
                                <a href="../maincontents/index.php?page=userregistrationmodule" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'userregistrationmodule') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'userregistrationmodule') ? 'bg-white' : ''; ?>"></span>
                                    User Registration Module
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=interestbasedalertsettings" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'interestbasedalertsettings') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'interestbasedalertsettings') ? 'bg-white' : ''; ?>"></span>
                                    Interest-Based Alert Settings
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=geofencemanager" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'geofencemanager') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'geofencemanager') ? 'bg-white' : ''; ?>"></span>
                                    Geo-Fence Manager
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=contactchannelselector" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'contactchannelselector') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'contactchannelselector') ? 'bg-white' : ''; ?>"></span>
                                    Contact Channel Selector
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=optinoptoutcontrolpanel" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'optinoptoutcontrolpanel') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'optinoptoutcontrolpanel') ? 'bg-white' : ''; ?>"></span>
                                    Opt-In/Opt-Out Control Panel
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Audit Log Section -->
                <li class="mb-3">
                    <div class="relative">
                        <a href="#" id="audit-log-toggle" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center justify-between
                            <?php echo $isAuditLogSubmenuActive ? 'bg-gray-700 text-white' : ''; ?>"
                            data-state="<?php echo $auditLogToggleState; ?>">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200 <?php echo $isAuditLogSubmenuActive ? 'text-white' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="font-medium">Audit Log</span>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-white transform transition-transform duration-200 <?php echo $isAuditLogSubmenuActive ? 'rotate-90' : ''; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <ul id="audit-log-submenu" class="ml-6 mt-2 space-y-2 <?php echo $auditLogSubmenuHiddenClass; ?>">
                            <li>
                                <a href="../maincontents/index.php?page=messagedeliverylogger" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'messagedeliverylogger') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'messagedeliverylogger') ? 'bg-white' : ''; ?>"></span>
                                    Message Delivery Logger
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=adminactiontracker" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'adminactiontracker') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'adminactiontracker') ? 'bg-white' : ''; ?>"></span>
                                    Admin Action Tracker
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=userresponselog" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'userresponselog') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'userresponselog') ? 'bg-white' : ''; ?>"></span>
                                    User Response Log
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=systemerrormonitor" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'systemerrormonitor') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'systemerrormonitor') ? 'bg-white' : ''; ?>"></span>
                                    System Error Monitor
                                </a>
                            </li>
                            <li>
                                <a href="../maincontents/index.php?page=auditreportgenerator" class="group block py-2 px-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition-colors duration-200 flex items-center
                                    <?php echo ($currentPage == 'auditreportgenerator') ? 'bg-gray-800 text-white' : ''; ?>">
                                    <span class="dot mr-2 w-2 h-2 bg-gray-600 group-hover:bg-white rounded-full <?php echo ($currentPage == 'auditreportgenerator') ? 'bg-white' : ''; ?>"></span>
                                    Audit Report Generator
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="mt-auto pt-6 border-t border-gray-700">
            <ul>
                <li class="mb-3">
                    <div class="relative">
                        <!-- Removed id="users-toggle" and data-state attributes -->
                        <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                            <div class="flex items-center">
                                <!-- Standard user icon SVG -->
                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">Users</span>
                            </div>
                            <!-- Removed the toggle arrow SVG -->
                        </a>
                        <ul id="users-submenu" class="ml-6 mt-2 space-y-2 hidden">
                            <li>
                                <span class="block py-2 px-3 text-gray-500">No user-specific modules here.</span>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mb-3">
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 2v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span class="font-medium">Reports</span>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="font-medium">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="group block py-3 px-4 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-white transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="font-medium">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const massNotificationToggleButton = document.getElementById('mass-notification-toggle');
            const massNotificationSubmenu = document.getElementById('mass-notification-submenu');

            const alertCategoriesToggleButton = document.getElementById('alert-categories-toggle');
            const alertCategoriesSubmenu = document.getElementById('alert-categories-submenu');

            const twoWayCommsToggleButton = document.getElementById('two-way-comms-toggle');
            const twoWayCommsSubmenu = document.getElementById('two-way-comms-submenu');

            // Auto Warnings toggle and submenu
            const autoWarningsToggleButton = document.getElementById('auto-warnings-toggle');
            const autoWarningsSubmenu = document.getElementById('auto-warnings-submenu');

            // Multilingual toggle and submenu
            const multilingualToggleButton = document.getElementById('multilingual-toggle');
            const multilingualSubmenu = document.getElementById('multilingual-submenu');

            // Users submenu (no longer a toggle button)
            const usersSubmenu = document.getElementById('users-submenu'); // Still get reference to submenu

            // Subscriptions toggle and submenu
            const subscriptionsToggleButton = document.getElementById('subscriptions-toggle');
            const subscriptionsSubmenu = document.getElementById('subscriptions-submenu');

            // Audit Log toggle and submenu
            const auditLogToggleButton = document.getElementById('audit-log-toggle');
            const auditLogSubmenu = document.getElementById('audit-log-submenu');


            function setupToggle(button, submenu) {
                if (button && submenu) {
                    button.addEventListener('click', function(event) {
                        event.preventDefault(); // Prevent default link behavior
                        const isHidden = submenu.classList.contains('hidden');

                        if (isHidden) {
                            submenu.classList.remove('hidden');
                            button.setAttribute('data-state', 'open');
                            button.querySelector('svg:last-child').classList.add('rotate-90');
                        } else {
                            submenu.classList.add('hidden');
                            button.setAttribute('data-state', 'closed');
                            button.querySelector('svg:last-child').classList.remove('rotate-90');
                        }
                    });
                }
            }

            setupToggle(massNotificationToggleButton, massNotificationSubmenu);
            setupToggle(alertCategoriesToggleButton, alertCategoriesSubmenu);
            setupToggle(twoWayCommsToggleButton, twoWayCommsSubmenu);
            setupToggle(autoWarningsToggleButton, autoWarningsSubmenu);
            setupToggle(multilingualToggleButton, multilingualSubmenu);
            // Removed: setupToggle(usersToggleButton, usersSubmenu); - as it's no longer a toggle
            setupToggle(subscriptionsToggleButton, subscriptionsSubmenu);
            setupToggle(auditLogToggleButton, auditLogSubmenu);
        });
    </script>

</body>
</html>
