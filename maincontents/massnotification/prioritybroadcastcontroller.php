<?php
// --- PHP PLACEHOLDER LOGIC ---
// Assume user is logged in for demonstration
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Set to empty string for no picture, or a valid URL
$hasProfilePic = !empty($userProfilePic);

// Placeholder for priority level definitions (in a real app, these would be configurable)
$priorityLevels = [
    'Normal' => [
        'description' => 'Standard alerts with no special urgency. Follows default scheduling and opt-out settings.',
        'color' => 'text-gray-600',
        'details' => [
            'Delivery Behavior' => 'Standard queue processing, subject to normal system load.',
            'Recipient Opt-out' => 'Respected.'
        ]
    ],
    'High' => [
        'description' => 'Important alerts requiring timely attention. May have slightly elevated delivery priority.',
        'color' => 'text-yellow-700',
        'details' => [
            'Delivery Behavior' => 'Elevated queue priority, faster processing.',
            'Recipient Opt-out' => 'Respected by default, configurable override.'
        ]
    ],
    'Critical' => [
        'description' => 'Life-threatening or immediate-action-required alerts. Overrides scheduling, bypasses opt-out settings, and receives highest delivery priority.',
        'color' => 'text-red-700 font-bold',
        'details' => [
            'Delivery Behavior' => 'Highest queue priority, immediate dispatch attempts, multiple retry attempts.',
            'Recipient Opt-out' => 'Bypassed by default, non-negotiable for critical safety alerts.'
        ]
    ]
];

// Placeholder for system-wide priority settings (configurable in a real app)
$systemPrioritySettings = [
    'default_priority' => 'Normal',
    'critical_alert_channels' => ['SMS', 'Email', 'PA System'],
    'high_priority_retry_attempts' => 3
];
// --- END PHP PLACEHOLDER LOGIC ---
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Priority Broadcast Controller</h1>

        <?php if ($isLoggedIn) : ?>
            <div class="flex items-center space-x-3">
                <?php if ($hasProfilePic) : ?>
                    <img src="<?php echo htmlspecialchars($userProfilePic); ?>"
                         alt="<?php echo htmlspecialchars($userName); ?>'s Profile Picture"
                         class="w-10 h-10 rounded-full object-cover border-2 border-blue-400">
                <?php else : ?>
                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center border-2 border-gray-400">
                        <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                <?php endif; ?>
                <span class="text-lg font-medium hidden md:block"><?php echo htmlspecialchars($userName); ?></span>
            </div>
        <?php endif; ?>
    </header>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Control Message Urgency & Delivery Rules</h2>
        <p class="text-gray-700 leading-relaxed">
            The Priority Broadcast Controller allows administrators to define and manage how messages of different urgency levels (Normal, High, Critical) are handled by the system, ensuring crucial alerts are delivered effectively and without unnecessary delays.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Priority Level Definitions & Behaviors</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($priorityLevels as $levelName => $data) : ?>
                <div class="border border-gray-200 rounded-lg p-5 shadow-sm bg-gray-50 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-semibold <?php echo htmlspecialchars($data['color']); ?> mb-3 flex items-center">
                            <?php
                                echo match($levelName) {
                                    'Normal' => '<svg class="inline-block w-6 h-6 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l3 3a1 1 0 001.414-1.414L11 9.586V6z" clip-rule="evenodd"></path></svg>',
                                    'High' => '<svg class="inline-block w-6 h-6 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.3 2.659-1.3 3.424 0l.026.046.026.045a4.747 4.747 0 00.373.57l4.316 6.817a4.747 4.747 0 01.197.351l.034.053a4.747 4.747 0 01.139.31L18 16.099A3 3 0 0115.535 19H4.464A3 3 0 012 16.099L4.316 9.948a4.747 4.747 0 01.139-.31L4.48 9.582a4.747 4.747 0 00.197-.351l4.316-6.817a4.747 4.747 0 00.373-.57l.026-.045.026-.046zM10 13a1 1 0 100 2h.01a1 1 0 100-2H10zm0-4a1 1 0 00-1 1v2a1 1 0 102 0V10a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>',
                                    'Critical' => '<svg class="inline-block w-6 h-6 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>',
                                    default => ''
                                };
                                echo htmlspecialchars($levelName);
                            ?>
                        </h3>
                        <p class="text-gray-700 text-sm mb-3"><?php echo htmlspecialchars($data['description']); ?></p>
                        <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                            <?php foreach ($data['details'] as $detailKey => $detailValue) : ?>
                                <li><strong><?php echo htmlspecialchars($detailKey); ?>:</strong> <?php echo htmlspecialchars($detailValue); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="mt-4 text-right">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Configure
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">System-Wide Priority Default Settings</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            These settings define the default behavior for messages across the entire system. Individual message priorities set in the Message Composer can override these defaults.
        </p>

        <div class="space-y-6">
            <div>
                <label for="default_priority" class="block text-sm font-medium text-gray-700 mb-1">Default Message Priority:</label>
                <select id="default_priority" name="default_priority" class="mt-1 block w-full md:w-1/3 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="Normal" <?php echo ($systemPrioritySettings['default_priority'] === 'Normal') ? 'selected' : ''; ?>>Normal</option>
                    <option value="High" <?php echo ($systemPrioritySettings['default_priority'] === 'High') ? 'selected' : ''; ?>>High</option>
                </select>
                <p class="text-xs text-gray-500 mt-1">New messages will default to this priority unless specified otherwise.</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mandatory Channels for Critical Alerts:</label>
                <div class="mt-2 space-y-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="critical_channels[]" value="SMS" class="form-checkbox h-5 w-5 text-red-600 rounded"
                            <?php echo in_array('SMS', $systemPrioritySettings['critical_alert_channels']) ? 'checked' : ''; ?>>
                        <span class="ml-2 text-gray-700">SMS</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="checkbox" name="critical_channels[]" value="Email" class="form-checkbox h-5 w-5 text-red-600 rounded"
                            <?php echo in_array('Email', $systemPrioritySettings['critical_alert_channels']) ? 'checked' : ''; ?>>
                        <span class="ml-2 text-gray-700">Email</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="checkbox" name="critical_channels[]" value="PA System" class="form-checkbox h-5 w-5 text-red-600 rounded"
                            <?php echo in_array('PA System', $systemPrioritySettings['critical_alert_channels']) ? 'checked' : ''; ?>>
                        <span class="ml-2 text-gray-700">PA System</span>
                    </label>
                </div>
                <p class="text-xs text-gray-500 mt-1">Critical alerts will attempt delivery via all selected channels regardless of individual message settings.</p>
            </div>

            <div>
                <label for="high_priority_retries" class="block text-sm font-medium text-gray-700 mb-1">Retry Attempts for High Priority:</label>
                <input type="number" id="high_priority_retries" name="high_priority_retries" min="0" max="10" value="<?php echo htmlspecialchars($systemPrioritySettings['high_priority_retry_attempts']); ?>"
                       class="mt-1 block w-20 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <p class="text-xs text-gray-500 mt-1">Number of times the system will retry sending a High priority message if initial attempt fails.</p>
            </div>
        </div>
        <div class="mt-8 flex justify-end">
            <button class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-2-4l-4 4m0 0l-4-4m4 4V3"></path></svg>
                Save System Settings
            </button>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Setting Message Priority</h2>
        <p class="text-gray-700 leading-relaxed mb-4">
            The urgency level for individual messages is set directly within the <a href="index.php?page=message_composer" class="text-blue-600 hover:text-blue-800 font-semibold">Message Composer</a>. The priority selected there will dictate how the message is processed based on the rules defined in this controller.
        </p>
        <div class="flex justify-center">
            <a href="index.php?page=message_composer" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                <svg class="-ml-1 mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                Go to Message Composer
            </a>
        </div>
    </section>

</div>