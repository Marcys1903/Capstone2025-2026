<?php
// --- PHP PLACEHOLDER LOGIC ---
// In a real application, these values would come from your session or database after login.
$isLoggedIn = true; // Assume user is logged in for demonstration
$userName = "Admin Marcus"; // Example user name

// Simulate a scenario where NO profile picture is uploaded
// To test with a picture, change this to a valid URL like:
// $userProfilePic = "https://via.placeholder.com/50/FF5733/FFFFFF?text=AM"; // Example PFP URL
$userProfilePic = ""; // Set to empty string to simulate no picture uploaded

// Determine if a profile picture URL exists and is not empty
$hasProfilePic = !empty($userProfilePic);

// Simulated data for charts
$activeAlertsCount = 3;
$totalRegisteredUsers = 1245;
$notificationsTodayCount = 28;

// Simulated data for System Health Gauge Chart (percentage)
$systemHealthPercentage = 85; // Example: 85% healthy
$systemHealthStatus = 'Normal'; // Derived from percentage, or could be independent
if ($systemHealthPercentage < 70 && $systemHealthPercentage >= 40) {
    $systemHealthStatus = 'Degraded';
} elseif ($systemHealthPercentage < 40) {
    $systemHealthStatus = 'Critical';
}

// Data for Total Registered Users Line Chart (simulated monthly growth)
$userGrowthData = [
    ['month' => 'Jan', 'users' => 1000],
    ['month' => 'Feb', 'users' => 1050],
    ['month' => 'Mar', 'users' => 1100],
    ['month' => 'Apr', 'users' => 1150],
    ['month' => 'May', 'users' => 1200],
    ['month' => 'Jun', 'users' => 1245],
];

// Data for Notifications Today Bar Chart (simulated hourly distribution)
$notificationsHourlyData = [
    ['hour' => '8 AM', 'count' => 3],
    ['hour' => '9 AM', 'count' => 5],
    ['hour' => '10 AM', 'count' => 8],
    ['hour' => '11 AM', 'count' => 6],
    ['hour' => '12 PM', 'count' => 4],
    ['hour' => '1 PM', 'count' => 2],
];

// Sample alert data for modals
$alertsData = [
    [
        'id' => 'EMG-2025-001',
        'category' => 'Fire Hazard',
        'status' => 'Active',
        'time' => '2025-07-23 14:30 PM',
        'description' => 'Large fire reported near industrial zone. Evacuation orders issued for Sector A. High severity.',
        'log' => 'Initial report received. Emergency services dispatched. Public alert sent.',
        'action_type' => 'Resolve'
    ],
    [
        'id' => 'EMG-2025-002',
        'category' => 'Weather Warning',
        'status' => 'Pending',
        'time' => '2025-07-23 11:00 AM',
        'description' => 'Severe thunderstorm warning for Metro Manila. Expected heavy rainfall and strong winds. Medium severity.',
        'log' => 'Warning drafted. Awaiting official confirmation for activation.',
        'action_type' => 'Activate'
    ],
    [
        'id' => 'EMG-2025-003',
        'category' => 'Public Safety',
        'status' => 'Active',
        'time' => '2025-07-23 09:15 AM',
        'description' => 'Missing person alert: John Doe, last seen near Central Park. Please report any sightings. Low severity.',
        'log' => 'Alert issued to local authorities. Public notification sent.',
        'action_type' => 'Resolve'
    ],
    [
        'id' => 'EMG-2025-004',
        'category' => 'System Maintenance',
        'status' => 'Completed',
        'time' => '2025-07-22 17:00 PM',
        'description' => 'Scheduled system maintenance completed successfully. All services restored.',
        'log' => 'Maintenance started at 16:00. Database optimization completed. Server rebooted. Services verified.',
        'action_type' => 'View Log'
    ]
];
// --- END PHP PLACEHOLDER LOGIC ---
?>

<header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
    <h1 class="text-3xl font-bold">Dashboard</h1>

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
    <div class="mb-4">
        <p class="text-lg font-semibold">Welcome, Admin Marcus!</p>
        <p class="text-gray-600">Overview of your emergency communication system.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <!-- Active Alerts - Counter Card -->
        <div class="bg-red-100 p-5 rounded-lg shadow-sm border border-red-200 flex flex-col items-center justify-center text-center">
            <h3 class="text-lg font-semibold text-red-800 mb-2">Active Alerts</h3>
            <svg class="w-12 h-12 text-red-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <p class="text-5xl font-bold text-red-900"><?php echo $activeAlertsCount; ?></p>
            <p class="text-sm text-red-700 mt-2">Currently ongoing emergency alerts</p>
        </div>

        <!-- Total Registered Users - Line Chart -->
        <div class="bg-blue-100 p-5 rounded-lg shadow-sm border border-blue-200 flex flex-col">
            <h3 class="text-lg font-semibold text-blue-800 mb-2">Total Registered Users</h3>
            <div class="flex-grow">
                <canvas id="usersChart"></canvas>
            </div>
            <p class="text-sm text-blue-700 mt-2">User growth over time</p>
        </div>

        <!-- Notifications Today - Bar Chart -->
        <div class="bg-green-100 p-5 rounded-lg shadow-sm border border-green-200 flex flex-col">
            <h3 class="text-lg font-semibold text-green-800 mb-2">Notifications Today</h3>
            <div class="flex-grow">
                <canvas id="notificationsChart"></canvas>
            </div>
            <p class="text-sm text-green-700 mt-2">Notifications dispatched hourly</p>
        </div>

        <!-- System Health - Gauge Chart -->
        <div class="bg-purple-100 p-5 rounded-lg shadow-sm border border-purple-200 flex flex-col items-center justify-center text-center">
            <h3 class="text-lg font-semibold text-purple-800 mb-2">System Health</h3>
            <div class="relative w-full max-w-[150px] h-[75px] mx-auto">
                <canvas id="systemHealthGauge"></canvas>
                <div class="absolute inset-x-0 bottom-0 flex items-center justify-center text-purple-900 font-bold text-2xl mb-2">
                    <?php echo $systemHealthPercentage; ?>%
                </div>
            </div>
            <p class="text-sm text-purple-700 mt-2">Status: <span class="font-semibold"><?php echo $systemHealthStatus; ?></span></p>
        </div>
    </div>
</section>

<section class="p-8 bg-white rounded-lg shadow-md mb-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Alerts</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Alert ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Time</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alertsData as $alert) : ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($alert['id']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($alert['category']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm <?php echo ($alert['status'] == 'Active') ? 'text-red-600' : (($alert['status'] == 'Pending') ? 'text-orange-600' : 'text-gray-600'); ?> font-semibold"><?php echo htmlspecialchars($alert['status']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($alert['time']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="#" onclick="openViewModal('<?php echo htmlspecialchars(json_encode($alert)); ?>')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</a>
                        <?php if ($alert['action_type'] == 'Resolve') : ?>
                            <a href="#" onclick="openActionModal('<?php echo htmlspecialchars($alert['id']); ?>', 'Resolve')" class="text-red-600 hover:text-red-900">Resolve</a>
                        <?php elseif ($alert['action_type'] == 'Activate') : ?>
                            <a href="#" onclick="openActionModal('<?php echo htmlspecialchars($alert['id']); ?>', 'Activate')" class="text-green-600 hover:text-green-900">Activate</a>
                        <?php elseif ($alert['action_type'] == 'View Log') : ?>
                            <a href="#" onclick="openViewLogModal('<?php echo htmlspecialchars($alert['id']); ?>', '<?php echo htmlspecialchars($alert['log']); ?>')" class="text-indigo-600 hover:text-indigo-900">View Log</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<section class="p-8 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Communication Channels Status</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm flex items-center justify-between">
            <span class="text-lg font-medium text-gray-700">SMS Gateway:</span>
            <span class="text-green-600 font-semibold">Operational</span>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm flex items-center justify-between">
            <span class="text-lg font-medium text-gray-700">Email Service:</span>
            <span class="text-green-600 font-semibold">Operational</span>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm flex items-center justify-between">
            <span class="text-lg font-medium text-gray-700">Mobile App Push:</span>
            <span class="text-green-600 font-semibold">Operational</span>
        </div>
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm flex items-center justify-between">
            <span class="text-lg font-medium text-gray-700">Voice Broadcast:</span>
            <span class="text-orange-600 font-semibold">Degraded (High Load)</span>
        </div>
    </div>
</section>

<!-- Modals -->
<!-- View Details Modal -->
<div id="viewModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Alert Details</h3>
        <div class="space-y-2 text-gray-700">
            <p><strong>Alert ID:</strong> <span id="modalAlertId"></span></p>
            <p><strong>Category:</strong> <span id="modalCategory"></span></p>
            <p><strong>Status:</strong> <span id="modalStatus"></span></p>
            <p><strong>Time:</strong> <span id="modalTime"></span></p>
            <p><strong>Description:</strong> <span id="modalDescription" class="block mt-1 p-2 bg-gray-100 rounded"></span></p>
        </div>
        <div class="mt-6 flex justify-end">
            <button onclick="closeModal('viewModal')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">Close</button>
        </div>
    </div>
</div>

<!-- Action Confirmation Modal (Resolve/Activate) -->
<div id="actionModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-sm p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4" id="actionModalTitle">Confirm Action</h3>
        <p class="text-gray-700 mb-4">Are you sure you want to <span id="actionTypeText" class="font-semibold"></span> alert <span id="actionAlertId" class="font-semibold"></span>?</p>
        <div class="mt-6 flex justify-end space-x-3">
            <button onclick="closeModal('actionModal')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">Cancel</button>
            <button onclick="performAction()" id="confirmActionButton" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">Confirm</button>
        </div>
    </div>
</div>

<!-- View Log Modal -->
<div id="viewLogModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center p-4 z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Alert Log for <span id="logModalAlertId"></span></h3>
        <div class="space-y-2 text-gray-700">
            <p id="modalLogContent" class="block mt-1 p-2 bg-gray-100 rounded whitespace-pre-wrap"></p>
        </div>
        <div class="mt-6 flex justify-end">
            <button onclick="closeModal('viewLogModal')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">Close</button>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data from PHP for charts
        const userGrowthData = <?php echo json_encode($userGrowthData); ?>;
        const notificationsHourlyData = <?php echo json_encode($notificationsHourlyData); ?>;
        const systemHealthPercentage = <?php echo $systemHealthPercentage; ?>;
        const alertsData = <?php echo json_encode($alertsData); ?>;

        // --- Total Registered Users Line Chart ---
        const usersCtx = document.getElementById('usersChart').getContext('2d');
        new Chart(usersCtx, {
            type: 'line',
            data: {
                labels: userGrowthData.map(row => row.month),
                datasets: [{
                    label: 'Registered Users',
                    data: userGrowthData.map(row => row.users),
                    borderColor: 'rgb(59, 130, 246)', // Tailwind blue-500
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    }
                }
            }
        });

        // --- Notifications Today Bar Chart ---
        const notificationsCtx = document.getElementById('notificationsChart').getContext('2d');
        new Chart(notificationsCtx, {
            type: 'bar',
            data: {
                labels: notificationsHourlyData.map(row => row.hour),
                datasets: [{
                    label: 'Notifications Sent',
                    data: notificationsHourlyData.map(row => row.count),
                    backgroundColor: 'rgb(16, 185, 129)', // Tailwind green-500
                    borderColor: 'rgb(5, 150, 105)', // Tailwind green-600
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    }
                }
            }
        });

        // --- System Health Gauge Chart ---
        const systemHealthCtx = document.getElementById('systemHealthGauge').getContext('2d');
        new Chart(systemHealthCtx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [systemHealthPercentage, 100 - systemHealthPercentage],
                    backgroundColor: ['rgb(139, 92, 246)', 'rgb(229, 231, 235)'], // Purple for health, light gray for remaining
                    borderColor: ['rgb(139, 92, 246)', 'rgb(229, 231, 235)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                circumference: 180, // Half circle
                rotation: -90,      // Start from the bottom
                cutout: '80%',      // Make it a thick ring
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: false // Disable tooltips for a cleaner gauge look
                    }
                }
            }
        });

        // --- Modal Functions ---
        let currentAlertId = '';
        let currentActionType = '';

        window.openViewModal = function(alertJson) {
            const alert = JSON.parse(alertJson);
            document.getElementById('modalAlertId').textContent = alert.id;
            document.getElementById('modalCategory').textContent = alert.category;
            document.getElementById('modalStatus').textContent = alert.status;
            document.getElementById('modalTime').textContent = alert.time;
            document.getElementById('modalDescription').textContent = alert.description;
            document.getElementById('viewModal').classList.remove('hidden');
        };

        window.openActionModal = function(alertId, actionType) {
            currentAlertId = alertId;
            currentActionType = actionType;
            document.getElementById('actionAlertId').textContent = alertId;
            document.getElementById('actionTypeText').textContent = actionType.toLowerCase();
            document.getElementById('actionModalTitle').textContent = `Confirm ${actionType} Alert`;
            document.getElementById('confirmActionButton').textContent = actionType;
            document.getElementById('confirmActionButton').className = `px-4 py-2 rounded-lg hover:opacity-90 transition-colors ${actionType === 'Resolve' ? 'bg-red-600 text-white' : 'bg-green-600 text-white'}`;
            document.getElementById('actionModal').classList.remove('hidden');
        };

        window.openViewLogModal = function(alertId, logContent) {
            document.getElementById('logModalAlertId').textContent = alertId;
            document.getElementById('modalLogContent').textContent = logContent;
            document.getElementById('viewLogModal').classList.remove('hidden');
        };

        window.performAction = function() {
            // In a real application, you would send an AJAX request here
            console.log(`Performing ${currentActionType} action for alert ID: ${currentAlertId}`);
            // Simulate action success
            alert(`Alert ${currentAlertId} has been ${currentActionType.toLowerCase()}d.`);
            closeModal('actionModal');
            // You might want to reload or update the table data here
            location.reload(); // Simple reload for demonstration
        };

        window.closeModal = function(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        };
    });
</script>
