<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data. In a real application, this data would come from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample feedback data with enriched details to support new functionalities
$feedbackEntries = [
    [
        'id' => 'FB-001',
        'category' => 'Bug Report',
        'subject' => 'Login issue on mobile',
        'message_content' => 'Users are reporting intermittent login failures on Android devices, specifically when using Chrome browser.',
        'status' => 'New',
        'submitted_by' => 'User A',
        'date' => '2025-07-25',
        'time' => '10:00 AM',
        'alert_id' => 'ALERT-FLOOD-001',
        'location' => 'Barangay 1',
        'keywords' => ['login', 'mobile', 'bug'],
        'channel' => 'Web Portal'
    ],
    [
        'id' => 'FB-002',
        'category' => 'Feature Request',
        'subject' => 'Add map view for incidents',
        'message_content' => 'It would be very helpful to see a map visualization of reported incidents and feedback locations.',
        'status' => 'Reviewed',
        'submitted_by' => 'User B',
        'date' => '2025-07-24',
        'time' => '09:30 AM',
        'alert_id' => 'ALERT-EARTHQUAKE-002',
        'location' => 'Commercial District',
        'keywords' => ['map', 'feature', 'visualization'],
        'channel' => 'Email Reply'
    ],
    [
        'id' => 'FB-003',
        'category' => 'General Comment',
        'subject' => 'System is very helpful',
        'message_content' => 'The system provided timely alerts during the recent storm. Great job!',
        'status' => 'Closed',
        'submitted_by' => 'User C',
        'date' => '2025-07-23',
        'time' => '08:45 AM',
        'alert_id' => 'ALERT-STORM-003',
        'location' => 'Industrial Zone',
        'keywords' => ['positive', 'general'],
        'channel' => 'SMS Reply'
    ],
    [
        'id' => 'FB-004',
        'category' => 'Status Update',
        'subject' => 'SAFE - Barangay 2',
        'message_content' => 'Reply SAFE to flood alert. I am okay at Barangay 2 evacuation center.',
        'status' => 'New',
        'submitted_by' => 'Resident D',
        'date' => '2025-07-25',
        'time' => '11:15 AM',
        'alert_id' => 'ALERT-FLOOD-001',
        'location' => 'Barangay 2',
        'keywords' => ['SAFE', 'status'],
        'channel' => 'SMS Reply'
    ],
    [
        'id' => 'FB-005',
        'category' => 'Need Help',
        'subject' => 'Trapped in Flood - Zone C',
        'message_content' => 'There\'s flooding in my house, still stuck in my house with 2 children. Need help!',
        'status' => 'New',
        'submitted_by' => 'Resident E',
        'date' => '2025-07-25',
        'time' => '11:30 AM',
        'alert_id' => 'ALERT-FLOOD-001',
        'location' => 'Flood Zone C',
        'keywords' => ['NEED HELP', 'TRAPPED', 'flood'],
        'channel' => 'Web Portal'
    ]
];

// Sample categories for feedback submission
$feedbackCategories = ['Bug Report', 'Feature Request', 'General Comment', 'Status Update', 'Need Help', 'Other'];

// Sample locations for filtering
$filterLocations = ['All', 'Barangay 1', 'Barangay 2', 'Commercial District', 'Industrial Zone', 'School Zone A', 'Flood Zone C'];

// Sample keywords for filtering
$filterKeywords = ['All', 'SAFE', 'NEED HELP', 'TRAPPED', 'flood', 'login', 'map'];
?>

<div class=" text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">User Feedback Collector</h1>
        <?php
        $hasProfilePic = !empty($userProfilePic);
        if ($isLoggedIn) : ?>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Collect & Review Citizen Responses to Alerts</h2>
        <p class="text-gray-700 leading-relaxed">
            This module transforms emergency communication into a two-way system, allowing citizens to provide real-time feedback, confirmations, and reports via SMS, email, or web. It enhances situational awareness and guides response efforts.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Submit New Feedback (Simulated Citizen Input)</h2>
        <form id="feedbackForm" class="space-y-4">
            <div>
                <label for="feedbackCategory" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="feedbackCategory" class="mt-1 block w-full md:w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">-- Select Category --</option>
                    <?php foreach ($feedbackCategories as $category) : ?>
                        <option value="<?php echo htmlspecialchars($category); ?>"><?php echo htmlspecialchars($category); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="feedbackSubject" class="block text-sm font-medium text-gray-700">Subject</label>
                <input type="text" id="feedbackSubject" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Brief summary of your feedback" required>
            </div>
            <div>
                <label for="feedbackMessage" class="block text-sm font-medium text-gray-700">Your Feedback</label>
                <textarea id="feedbackMessage" rows="5" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Provide detailed feedback here..." required></textarea>
            </div>
            <div>
                <label for="feedbackLocation" class="block text-sm font-medium text-gray-700">Location (Optional)</label>
                <select id="feedbackLocation" class="mt-1 block w-full md:w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">-- Select Location --</option>
                    <?php foreach ($filterLocations as $location) : ?>
                        <?php if ($location !== 'All'): ?>
                            <option value="<?php echo htmlspecialchars($location); ?>"><?php echo htmlspecialchars($location); ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="feedbackAlertId" class="block text-sm font-medium text-gray-700">Related Alert ID (Optional)</label>
                <input type="text" id="feedbackAlertId" class="mt-1 block w-full md:w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., ALERT-FLOOD-001">
            </div>
            <div>
                <label for="feedbackChannel" class="block text-sm font-medium text-gray-700">Submission Channel</label>
                <select id="feedbackChannel" class="mt-1 block w-full md:w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="Web Portal">Web Portal</option>
                    <option value="SMS Reply">SMS Reply</option>
                    <option value="Email Reply">Email Reply</option>
                </select>
            </div>
            <div class="text-right">
                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    Submit Feedback
                </button>
            </div>
        </form>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Recent Feedback Entries</h2>

        <!-- Filter Controls -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label for="filterLocation" class="block text-sm font-medium text-gray-700">Filter by Location:</label>
                <select id="filterLocation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <?php foreach ($filterLocations as $location) : ?>
                        <option value="<?php echo htmlspecialchars($location); ?>"><?php echo htmlspecialchars($location); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="filterKeyword" class="block text-sm font-medium text-gray-700">Filter by Keyword:</label>
                <select id="filterKeyword" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <?php foreach ($filterKeywords as $keyword) : ?>
                        <option value="<?php echo htmlspecialchars($keyword); ?>"><?php echo htmlspecialchars($keyword); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="All">All</option>
                    <option value="New">New</option>
                    <option value="Reviewed">Reviewed</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Alert ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Subject</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Submitted By</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date/Time</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="feedbackTableBody">
                    <!-- Feedback entries will be rendered here by JavaScript -->
                    <?php if (empty($feedbackEntries)): ?>
                        <tr>
                            <td colspan="9" class="px-6 py-4 text-center text-gray-500">No feedback entries found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Placeholder for Map Visualization -->
        <div class="mt-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Map Visualization of Feedback (Conceptual)</h3>
            <div class="bg-gray-200 h-64 flex items-center justify-center text-gray-500 rounded-md">
                Map integration would display feedback locations here.
            </div>
            <p class="text-sm text-gray-600 mt-2">
                In a real system, this area would integrate with a mapping service to visualize feedback hotspots and incident locations, aiding in resource deployment.
            </p>
        </div>
    </section>

    <!-- Custom Modals (replacing alert/confirm) -->
    <!-- Feedback Details Modal -->
    <div id="feedbackDetailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Feedback Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>ID:</strong> <span id="modalFeedbackId"></span></p>
                <p><strong>Alert ID:</strong> <span id="modalFeedbackAlertId"></span></p>
                <p><strong>Category:</strong> <span id="modalFeedbackCategory"></span></p>
                <p><strong>Subject:</strong> <span id="modalFeedbackSubject"></span></p>
                <p><strong>Location:</strong> <span id="modalFeedbackLocation"></span></p>
                <p><strong>Submitted By:</strong> <span id="modalSubmittedBy"></span></p>
                <p><strong>Date/Time:</strong> <span id="modalFeedbackDateTime"></span></p>
                <p><strong>Channel:</strong> <span id="modalFeedbackChannel"></span></p>
                <p><strong>Keywords:</strong> <span id="modalFeedbackKeywords"></span></p>
                <p><strong>Message:</strong></p>
                <div id="modalFeedbackMessage" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[100px] overflow-y-auto"></div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeFeedbackDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white text-center">
            <h3 class="text-lg font-bold mb-4" id="confirmationModalTitle">Confirm Action</h3>
            <p class="text-gray-700 mb-6" id="confirmationModalMessage"></p>
            <div class="flex justify-center space-x-4">
                <button id="confirmCancelBtn" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Cancel
                </button>
                <button id="confirmProceedBtn" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                    Proceed
                </button>
            </div>
        </div>
    </div>

    <!-- Alert Message Modal -->
    <div id="alertModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white text-center">
            <h3 class="text-lg font-bold mb-4" id="alertModalTitle">Notification</h3>
            <p class="text-gray-700 mb-6" id="alertModalMessage"></p>
            <div class="flex justify-center">
                <button id="alertCloseBtn" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                    OK
                </button>
            </div>
        </div>
    </div>

</div>

<script>
    // Initial feedback data from PHP
    let feedbackData = <?php echo json_encode($feedbackEntries); ?>;

    // Get references to DOM elements
    const feedbackTableBody = document.getElementById('feedbackTableBody');
    const filterLocationSelect = document.getElementById('filterLocation');
    const filterKeywordSelect = document.getElementById('filterKeyword');
    const filterStatusSelect = document.getElementById('filterStatus');

    // Custom Alert Modal elements
    const alertModal = document.getElementById('alertModal');
    const alertModalTitle = document.getElementById('alertModalTitle');
    const alertModalMessage = document.getElementById('alertModalMessage');
    const alertCloseBtn = document.getElementById('alertCloseBtn');

    // Custom Confirmation Modal elements
    const confirmationModal = document.getElementById('confirmationModal');
    const confirmationModalTitle = document.getElementById('confirmationModalTitle');
    const confirmationModalMessage = document.getElementById('confirmationModalMessage');
    const confirmCancelBtn = document.getElementById('confirmCancelBtn');
    const confirmProceedBtn = document.getElementById('confirmProceedBtn');
    let confirmCallback = null; // Stores the callback function for confirmation

    /**
     * Shows a custom alert modal.
     * @param {string} message - The message to display.
     * @param {string} [title='Notification'] - The title of the modal.
     */
    function showAlert(message, title = 'Notification') {
        alertModalTitle.textContent = title;
        alertModalMessage.textContent = message;
        alertModal.classList.remove('hidden');
    }

    /**
     * Shows a custom confirmation modal.
     * @param {string} message - The message to display.
     * @param {Function} callback - The function to call if confirmed (true for proceed, false for cancel).
     * @param {string} [title='Confirm Action'] - The title of the modal.
     */
    function showConfirm(message, callback, title = 'Confirm Action') {
        confirmationModalTitle.textContent = title;
        confirmationModalMessage.textContent = message;
        confirmCallback = callback; // Store the callback
        confirmationModal.classList.remove('hidden');
    }

    // Event listeners for custom modals
    alertCloseBtn.addEventListener('click', () => {
        alertModal.classList.add('hidden');
    });

    confirmCancelBtn.addEventListener('click', () => {
        confirmationModal.classList.add('hidden');
        if (confirmCallback) {
            confirmCallback(false); // Call callback with false for cancel
            confirmCallback = null; // Clear callback
        }
    });

    confirmProceedBtn.addEventListener('click', () => {
        confirmationModal.classList.add('hidden');
        if (confirmCallback) {
            confirmCallback(true); // Call callback with true for proceed
            confirmCallback = null; // Clear callback
        }
    });


    /**
     * Renders the feedback table based on the provided data.
     * @param {Array} dataToRender - The array of feedback objects to display.
     */
    function renderFeedbackTable(dataToRender) {
        feedbackTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="9" class="px-6 py-4 text-center text-gray-500">No feedback entries found matching filters.</td>`;
            feedbackTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(entry => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (entry.status === 'New') statusClass = 'bg-blue-100 text-blue-800';
            else if (entry.status === 'Reviewed') statusClass = 'bg-yellow-100 text-yellow-800';
            else if (entry.status === 'Closed') statusClass = 'bg-green-100 text-green-800';
            else statusClass = 'bg-gray-100 text-gray-800';

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${entry.id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${entry.alert_id || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${entry.category}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${entry.subject}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${entry.location || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${entry.submitted_by}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${entry.date} ${entry.time}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${entry.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewFeedback('${encodeURIComponent(JSON.stringify(entry))}')" class="text-indigo-600 hover:text-indigo-900 mr-4">View</button>
                    <button onclick="updateFeedbackStatus('${entry.id}', 'Reviewed')" class="text-blue-600 hover:text-blue-900 mr-4">Mark Reviewed</button>
                    <button onclick="updateFeedbackStatus('${entry.id}', 'Closed')" class="text-green-600 hover:text-green-900">Mark Closed</button>
                </td>
            `;
            feedbackTableBody.appendChild(row);
        });
    }

    /**
     * Filters the feedback data based on selected criteria and re-renders the table.
     */
    function filterFeedback() {
        const selectedLocation = filterLocationSelect.value;
        const selectedKeyword = filterKeywordSelect.value;
        const selectedStatus = filterStatusSelect.value;

        const filteredData = feedbackData.filter(entry => {
            const matchesLocation = selectedLocation === 'All' || entry.location === selectedLocation;
            const matchesStatus = selectedStatus === 'All' || entry.status === selectedStatus;

            // Check if any of the entry's keywords match the selected keyword
            const matchesKeyword = selectedKeyword === 'All' ||
                                   (entry.keywords && entry.keywords.includes(selectedKeyword)) ||
                                   (entry.message_content && entry.message_content.toLowerCase().includes(selectedKeyword.toLowerCase()));

            return matchesLocation && matchesStatus && matchesKeyword;
        });

        renderFeedbackTable(filteredData);
    }

    // Event listeners for filter changes
    filterLocationSelect.addEventListener('change', filterFeedback);
    filterKeywordSelect.addEventListener('change', filterFeedback);
    filterStatusSelect.addEventListener('change', filterFeedback);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderFeedbackTable(feedbackData);

        // Handle submission of new feedback
        document.getElementById('feedbackForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const feedbackCategory = document.getElementById('feedbackCategory').value;
            const feedbackSubject = document.getElementById('feedbackSubject').value;
            const feedbackMessage = document.getElementById('feedbackMessage').value;
            const feedbackLocation = document.getElementById('feedbackLocation').value;
            const feedbackAlertId = document.getElementById('feedbackAlertId').value;
            const feedbackChannel = document.getElementById('feedbackChannel').value;

            if (!feedbackCategory || !feedbackSubject || !feedbackMessage) {
                showAlert('Please fill in all required feedback fields (Category, Subject, Message).', 'Submission Error');
                return;
            }

            // Simulate keyword extraction for unstructured messages
            const extractedKeywords = [];
            if (feedbackMessage.toLowerCase().includes('safe')) extractedKeywords.push('SAFE');
            if (feedbackMessage.toLowerCase().includes('help')) extractedKeywords.push('NEED HELP');
            if (feedbackMessage.toLowerCase().includes('trapped')) extractedKeywords.push('TRAPPED');
            if (feedbackMessage.toLowerCase().includes('flood')) extractedKeywords.push('flood');


            // Simulate sending data to a backend
            const newFeedbackId = 'FB-' + (feedbackData.length + 1).toString().padStart(3, '0'); // Simple ID generation
            const now = new Date();
            const newFeedbackEntry = {
                id: newFeedbackId,
                category: feedbackCategory,
                subject: feedbackSubject,
                message_content: feedbackMessage,
                status: 'New',
                submitted_by: 'Citizen ' + String.fromCharCode(65 + Math.floor(Math.random() * 26)), // Random citizen name
                date: now.toISOString().slice(0, 10),
                time: now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
                alert_id: feedbackAlertId || 'N/A',
                location: feedbackLocation || 'N/A',
                keywords: extractedKeywords,
                channel: feedbackChannel
            };

            // In a real application, you'd send an AJAX request here to save to DB.
            // For this simulation, we add it to our in-memory array.
            feedbackData.push(newFeedbackEntry);
            showAlert('Your feedback has been submitted successfully!', 'Feedback Submitted');

            // Re-render the table with the new entry and current filters applied
            filterFeedback();

            // Clear the form
            document.getElementById('feedbackForm').reset();
        });

        /**
         * Opens the feedback details modal with the given entry's data.
         * @param {string} feedbackJson - JSON string of the feedback entry.
         */
        window.viewFeedback = function(feedbackJson) {
            const feedback = JSON.parse(decodeURIComponent(feedbackJson));
            document.getElementById('modalFeedbackId').textContent = feedback.id;
            document.getElementById('modalFeedbackAlertId').textContent = feedback.alert_id;
            document.getElementById('modalFeedbackCategory').textContent = feedback.category;
            document.getElementById('modalFeedbackSubject').textContent = feedback.subject;
            document.getElementById('modalFeedbackLocation').textContent = feedback.location;
            document.getElementById('modalSubmittedBy').textContent = feedback.submitted_by;
            document.getElementById('modalFeedbackDateTime').textContent = `${feedback.date} ${feedback.time}`;
            document.getElementById('modalFeedbackChannel').textContent = feedback.channel;
            document.getElementById('modalFeedbackKeywords').textContent = feedback.keywords.length > 0 ? feedback.keywords.join(', ') : 'None';
            document.getElementById('modalFeedbackMessage').textContent = feedback.message_content || 'No detailed message provided.';

            document.getElementById('feedbackDetailsModal').classList.remove('hidden');
        };

        // Close feedback details modal
        document.getElementById('closeFeedbackDetailsModal').addEventListener('click', function() {
            document.getElementById('feedbackDetailsModal').classList.add('hidden');
        });

        /**
         * Updates the status of a feedback entry.
         * @param {string} id - The ID of the feedback entry.
         * @param {string} newStatus - The new status ('Reviewed' or 'Closed').
         */
        window.updateFeedbackStatus = function(id, newStatus) {
            showConfirm(`Are you sure you want to mark feedback ${id} as ${newStatus}?`, (confirmed) => {
                if (confirmed) {
                    const index = feedbackData.findIndex(entry => entry.id === id);
                    if (index !== -1) {
                        feedbackData[index].status = newStatus;
                        showAlert(`Feedback ${id} marked as ${newStatus}.`, 'Status Updated');
                        filterFeedback(); // Re-render table to reflect status change
                    }
                }
            }, 'Update Status');
        };
    });
</script>
