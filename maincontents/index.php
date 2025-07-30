<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Dashboard - Emergency Communication System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Inter", sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox to lay out sidebar and content */
            min-height: 100vh;
            overflow: hidden; /* Prevent body from scrolling */
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

        /* Specific styles for main content scrolling */
        #main-content-area {
            overflow-y: auto; /* Enable vertical scrolling for main content */
            height: 100vh; /* Ensure it takes full viewport height for scrolling context */
            scroll-behavior: smooth; /* Add smooth scrolling */
        }
    </style>
</head>
<body class="bg-gray-100">

    <?php include '../sidebar/sidebar.php'; // Corrected path to sidebar.php ?>

    <div id="main-content-area" class="flex-grow p-8 text-gray-800">
        <?php
        // Determine which content to load based on a query parameter
        $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; // Default to dashboard if no 'page' parameter is set

        switch ($page) {
            case 'dashboard':
                include 'dashboard.php';
                break;
            case 'message_composer':
                include 'massnotification/messagecomposer.php';
                break;
            case 'channel_selector':
                include 'massnotification/channelselector.php';
                break;
            case 'recipient_group_manager':
                include 'massnotification/recipientgroupmanager.php';
                break;
            case 'delivery_status_tracker':
                include 'massnotification/deliverystatustracker.php';
                break;
            case 'priority_broadcast_controller':
                include 'massnotification/prioritybroadcastcontroller.php';
                break;
            case 'mass_notification_main': // This is the main landing page for Mass Notification
                include 'massnotification/massnotification.php';
                break;
            case 'event_type_classifier': // New case for Event Type Classifier
                include 'alertcategories/eventtypeclassifier.php';
                break;
            case 'severity_level_assigner': // New case for Severity Level Assigner
                include 'alertcategories/severitylevelassigner.php';
                break;
            case 'location_based_categorization': // New case for Location-Based Categorization
                include 'alertcategories/locationbasedcategorization.php';
                break;
            case 'incident_validation_interface': // New case for Incident Validation Interface
                include 'alertcategories/incidentvalidationinterface.php';
                break;
            case 'predefined_alert_templates': // New case for Predefined Alert Templates (renamed)
                include 'alertcategories/predefinedalerttemplates.php';
                break;
            // NEW CASES FOR TWO-WAY COMMS MODULES
            case 'auto_responder_engine':
                include 'twowaycomms/autoresponderengine.php';
                break;
            case 'escalation_trigger_system':
                include 'twowaycomms/escalationtriggersystem.php';
                break;
            case 'incident_reporting_module':
                include 'twowaycomms/incidentreportingmodule.php';
                break;
            case 'live_chat_gateway':
                include 'twowaycomms/livechatgateway.php';
                break;
            case 'user_feedback_collector':
                include 'twowaycomms/userfeedbackcollector.php';
                break;
            // NEW CASES FOR AUTO WARNINGS MODULES
            case 'apiconnectormodule':
                include 'autowarnings/apiconnectormodule.php';
                break;
            case 'dataparserformatter':
                include 'autowarnings/dataparserformatter.php';
                break;
            case 'eventmatchingengine':
                include 'autowarnings/eventmatchingengine.php';
                break;
            case 'feedhealthmonitor':
                include 'autowarnings/feedhealthmonitor.php';
                break;
            case 'realtimealerttrigger':
                include 'autowarnings/realtimealerttrigger.php';
                break;
            // NEW CASES FOR MULTILINGUAL MODULES
            case 'languagepreferencemanager':
                include 'multilingual/languagepreferencemanager.php';
                break;
            case 'aipoweredtranslator':
                include 'multilingual/aipoweredtranslator.php';
                break;
            case 'culturalcontextadjuster':
                include 'multilingual/culturalcontextadjuster.php';
                break;
            case 'voicetranslationengine':
                include 'multilingual/voicetranslationengine.php';
                break;
            case 'languagefallbackhandler':
                include 'multilingual/languagefallbackhandler.php';
                break;
            // UPDATED CASES FOR SUBSCRIPTIONS MODULES (previously under Users)
            case 'userregistrationmodule':
                include 'subscriptions/userregistrationmodule.php';
                break;
            case 'interestbasedalertsettings':
                include 'subscriptions/interestbasedalertsettings.php';
                break;
            case 'geofencemanager':
                include 'subscriptions/geofencemanager.php';
                break;
            case 'contactchannelselector':
                include 'subscriptions/contactchannelselector.php';
                break;
            case 'optinoptoutcontrolpanel':
                include 'subscriptions/optinoptoutcontrolpanel.php';
                break;
            // NEW CASES FOR AUDIT LOG MODULES
            case 'messagedeliverylogger':
                include 'auditlog/messagedeliverylogger.php';
                break;
            case 'adminactiontracker':
                include 'auditlog/adminactiontracker.php';
                break;
            case 'userresponselog':
                include 'auditlog/userresponselog.php';
                break;
            case 'systemerrormonitor':
                include 'auditlog/systemerrormonitor.php';
                break;
            case 'auditreportgenerator':
                include 'auditlog/auditreportgenerator.php';
                break;
            default:
                // Fallback for any unknown page requests
                include 'dashboard.php';
                break;
        }
        ?>
    </div>

</body>
</html>
