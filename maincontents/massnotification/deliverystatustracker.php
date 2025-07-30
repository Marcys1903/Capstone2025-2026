<?php
// --- PHP PLACEHOLDER LOGIC ---
// Assume user is logged in for demonstration
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Set to empty string for no picture, or a valid URL
$hasProfilePic = !empty($userProfilePic);

// Placeholder for message delivery data (in a real app, this would come from a database/API)
$messageStats = [
    'delivered' => 850,
    'failed' => 25,
    'pending' => 10,
    'total' => 885
];

$channelBreakdown = [
    'SMS' => ['delivered' => 400, 'failed' => 15, 'pending' => 5],
    'Email' => ['delivered' => 450, 'failed' => 10, 'pending' => 5],
    'PA System' => ['delivered' => 0, 'failed' => 0, 'pending' => 0], // Placeholder as PA usually doesn't have "delivery" confirmation like SMS/Email
];

// Placeholder for recent message log (in a real app, this would be dynamic and paginated)
$messageLog = [
    ['id' => 'MSG-001', 'subject' => 'Emergency Evacuation Drill', 'channels' => 'SMS, Email', 'status' => 'Delivered', 'time' => '2025-07-24 09:30 AM', 'actions' => ['view_log']],
    ['id' => 'MSG-002', 'subject' => 'Typhoon Watch Advisory', 'channels' => 'SMS', 'status' => 'Failed', 'time' => '2025-07-24 10:15 AM', 'actions' => ['view_log', 'retry']],
    ['id' => 'MSG-003', 'subject' => 'System Maintenance Update', 'channels' => 'Email', 'status' => 'Pending', 'time' => '2025-07-24 11:00 AM', 'actions' => ['view_log']],
    ['id' => 'MSG-004', 'subject' => 'Fire Drill Notice', 'channels' => 'SMS, Email', 'status' => 'Delivered', 'time' => '2025-07-23 02:00 PM', 'actions' => ['view_log']],
    ['id' => 'MSG-005', 'subject' => 'Road Closure Alert', 'channels' => 'SMS', 'status' => 'Delivered', 'time' => '2025-07-23 03:45 PM', 'actions' => ['view_log']],
];
// --- END PHP PLACEHOLDER LOGIC ---
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Delivery Status Tracker</h1>

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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Monitor Message Deliveries</h2>
        <p class="text-gray-700 leading-relaxed">
            Gain real-time insights into the status of your sent messages. This module provides a comprehensive overview of delivery rates, channel performance, and a detailed log history to ensure your critical information reaches its intended recipients.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Overall Delivery Statistics</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <div class="bg-green-50 p-6 rounded-lg shadow-sm border border-green-200">
                <h3 class="text-lg font-semibold text-green-800">Delivered</h3>
                <p class="text-4xl font-bold text-green-900 mt-2"><?php echo number_format($messageStats['delivered']); ?></p>
                <p class="text-sm text-green-700">Messages successfully delivered</p>
            </div>
            <div class="bg-red-50 p-6 rounded-lg shadow-sm border border-red-200">
                <h3 class="text-lg font-semibold text-red-800">Failed</h3>
                <p class="text-4xl font-bold text-red-900 mt-2"><?php echo number_format($messageStats['failed']); ?></p>
                <p class="text-sm text-red-700">Messages failed to deliver</p>
            </div>
            <div class="bg-yellow-50 p-6 rounded-lg shadow-sm border border-yellow-200">
                <h3 class="text-lg font-semibold text-yellow-800">Pending</h3>
                <p class="text-4xl font-bold text-yellow-900 mt-2"><?php echo number_format($messageStats['pending']); ?></p>
                <p class="text-sm text-yellow-700">Messages awaiting delivery</p>
            </div>
        </div>
        <p class="text-right text-sm text-gray-500 mt-4">Total Messages Sent: <?php echo number_format($messageStats['total']); ?></p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Delivery Breakdown Per Channel</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($channelBreakdown as $channelName => $data) : ?>
                <div class="border border-gray-200 rounded-lg p-5 shadow-sm bg-gray-50">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3"><?php echo htmlspecialchars($channelName); ?></h3>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li>Delivered: <span class="font-bold text-green-700"><?php echo number_format($data['delivered']); ?></span></li>
                        <li>Failed: <span class="font-bold text-red-700"><?php echo number_format($data['failed']); ?></span></li>
                        <li>Pending: <span class="font-bold text-yellow-700"><?php echo number_format($data['pending']); ?></span></li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Message Log History</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Message ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Subject/Content Snippet</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Channels</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Time Sent</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messageLog as $log) : ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($log['id']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars(substr($log['subject'], 0, 50)) . (strlen($log['subject']) > 50 ? '...' : ''); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?php echo htmlspecialchars($log['channels']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold
                                <?php
                                    if ($log['status'] === 'Delivered') echo 'text-green-600';
                                    elseif ($log['status'] === 'Failed') echo 'text-red-600';
                                    elseif ($log['status'] === 'Pending') echo 'text-yellow-600';
                                ?>
                            "><?php echo htmlspecialchars($log['status']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($log['time']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <?php if (in_array('view_log', $log['actions'])) : ?>
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-4">View Log</a>
                                <?php endif; ?>
                                <?php if (in_array('retry', $log['actions'])) : ?>
                                    <a href="#" class="text-blue-600 hover:text-blue-900">Retry</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-4 text-center">
            <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                View Full Log History
            </button>
        </div>
    </section>

</div>