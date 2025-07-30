<?php
// --- PHP PLACEHOLDER LOGIC ---
// This section simulates backend data for user response logs.
// In a real application, this data would be fetched from a database.
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample user response log data
$userResponses = [
    [
        'response_id' => 'RES-001',
        'user_id' => 'USR-001',
        'user_name' => 'John Doe',
        'response_type' => 'Confirmation',
        'message_content' => 'I confirm receipt of the emergency alert.',
        'timestamp' => '2025-07-28 09:40 AM',
        'status' => 'Processed',
        'details' => 'User confirmed alert via SMS reply.',
    ],
    [
        'response_id' => 'RES-002',
        'user_id' => 'USR-003',
        'user_name' => 'Alice Brown',
        'response_type' => 'Inquiry',
        'message_content' => 'Can you provide more details about the evacuation zone?',
        'timestamp' => '2025-07-28 09:45 AM',
        'status' => 'Pending Review',
        'details' => 'User sent an inquiry via email. Requires follow-up from support.',
    ],
    [
        'response_id' => 'RES-003',
        'user_id' => 'USR-002',
        'user_name' => 'Jane Smith',
        'response_type' => 'Opt-Out Request',
        'message_content' => 'Please unsubscribe me from all future alerts.',
        'timestamp' => '2025-07-27 03:10 PM',
        'status' => 'Processed',
        'details' => 'User opted out via web portal. Subscription status updated.',
    ],
    [
        'response_id' => 'RES-004',
        'user_id' => 'USR-001',
        'user_name' => 'John Doe',
        'response_type' => 'Feedback',
        'message_content' => 'The alert system worked very well, clear and timely.',
        'timestamp' => '2025-07-27 11:00 AM',
        'status' => 'Processed',
        'details' => 'Positive feedback received via mobile app.',
    ],
    [
        'response_id' => 'RES-005',
        'user_id' => 'USR-004',
        'user_name' => 'Bob Johnson',
        'response_type' => 'Error Report',
        'message_content' => 'I did not receive the last alert. My phone number is incorrect.',
        'timestamp' => '2025-07-26 09:00 AM',
        'status' => 'Unresolved',
        'details' => 'User reported missing alert. Contact information needs verification and update.',
    ],
];

// Sample options for dropdowns
$responseTypes = ['All', 'Confirmation', 'Inquiry', 'Opt-Out Request', 'Feedback', 'Error Report', 'Status Update'];
$responseStatuses = ['All', 'Processed', 'Pending Review', 'Unresolved', 'Archived'];
$users = ['All', 'John Doe (USR-001)', 'Jane Smith (USR-002)', 'Alice Brown (USR-003)', 'Bob Johnson (USR-004)'];
?>

<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">User Response Log</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Monitor User Interactions and Feedback</h2>
        <p class="text-gray-700 leading-relaxed">
            The User Response Log captures and displays all direct responses and interactions from users of the emergency communication system. This module is vital for understanding user engagement, addressing inquiries, managing opt-out requests, and gathering critical feedback to improve service delivery.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">User Response Log</h2>

        <div class="mb-6 flex flex-wrap justify-between items-center gap-4">
            <!-- Filter Controls -->
            <div class="flex flex-wrap space-x-4 gap-y-2">
                <div>
                    <label for="filterUser" class="block text-sm font-medium text-gray-700">Filter by User:</label>
                    <select id="filterUser" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($users as $user) : ?>
                            <option value="<?php echo htmlspecialchars($user); ?>"><?php echo htmlspecialchars($user); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterResponseType" class="block text-sm font-medium text-gray-700">Filter by Response Type:</label>
                    <select id="filterResponseType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($responseTypes as $type) : ?>
                            <option value="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="filterStatus" class="block text-sm font-medium text-gray-700">Filter by Status:</label>
                    <select id="filterStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <?php foreach ($responseStatuses as $status) : ?>
                            <option value="<?php echo htmlspecialchars($status); ?>"><?php echo htmlspecialchars($status); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Response ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Response Type</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Message Content</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Timestamp</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="responseTableBody">
                    <!-- Responses will be rendered here by JavaScript -->
                    <?php if (empty($userResponses)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No user responses found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Custom Modals -->
    <!-- Response Details Modal -->
    <div id="detailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4">Response Details</h3>
            <div class="space-y-3 text-gray-700">
                <p><strong>Response ID:</strong> <span id="modalResponseId"></span></p>
                <p><strong>User:</strong> <span id="modalUser"></span></p>
                <p><strong>Response Type:</strong> <span id="modalResponseType"></span></p>
                <p><strong>Timestamp:</strong> <span id="modalTimestamp"></span></p>
                <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                <p><strong>Message Content:</strong></p>
                <div id="modalMessageContent" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
                <p><strong>Details:</strong></p>
                <div id="modalDetails" class="p-3 bg-gray-100 rounded-md border border-gray-200 min-h-[80px] overflow-y-auto"></div>
            </div>
            <div class="mt-6 text-right">
                <button id="closeDetailsModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Alert Message Modal (re-used from other modules) -->
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

    <!-- Confirmation Modal (re-used from other modules) -->
    <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white text-center">
            <h3 class="text-lg font-bold mb-4" id="confirmationModalTitle">Confirm Action</h3>
            <p class="text-gray-700 mb-6" id="confirmationModalMessage"></p>
            <div class="flex justify-center space-x-4">
                <button id="confirmCancelBtn" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Cancel
                </button>
                <button id="confirmProceedBtn" class="px-4 py-2 text-sm font-medium text-blue-600 rounded-md hover:bg-blue-700">
                    Proceed
                </button>
            </div>
        </div>
    </div>

</div>

<script>
    // Initial user responses data from PHP
    let userResponsesData = <?php echo json_encode($userResponses); ?>;

    // Get references to DOM elements
    const responseTableBody = document.getElementById('responseTableBody');
    const filterUserSelect = document.getElementById('filterUser');
    const filterResponseTypeSelect = document.getElementById('filterResponseType');
    const filterStatusSelect = document.getElementById('filterStatus');

    // Custom Alert Modal elements (re-used from other modules)
    const alertModal = document.getElementById('alertModal');
    const alertModalTitle = document.getElementById('alertModalTitle');
    const alertModalMessage = document.getElementById('alertModalMessage');
    const alertCloseBtn = document.getElementById('alertCloseBtn');

    // Custom Confirmation Modal elements (re-used from other modules)
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
     * Renders the user response table based on the provided data.
     * @param {Array} dataToRender - The array of response objects to display.
     */
    function renderResponseTable(dataToRender) {
        responseTableBody.innerHTML = ''; // Clear existing rows

        if (dataToRender.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = `<td colspan="7" class="px-6 py-4 text-center text-gray-500">No user responses found matching filters.</td>`;
            responseTableBody.appendChild(noDataRow);
            return;
        }

        dataToRender.forEach(response => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Determine status badge color
            let statusClass = '';
            if (response.status === 'Processed') statusClass = 'bg-green-100 text-green-800';
            else if (response.status === 'Pending Review') statusClass = 'bg-yellow-100 text-yellow-800';
            else if (response.status === 'Unresolved') statusClass = 'bg-red-100 text-red-800';
            else statusClass = 'bg-gray-100 text-gray-800'; // Default

            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${response.response_id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${response.user_name} (${response.user_id})</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${response.response_type}</td>
                <td class="px-6 py-4 text-sm text-gray-700 truncate max-w-xs">${response.message_content}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${response.timestamp || 'N/A'}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                        ${response.status}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button onclick="viewResponseDetails('${encodeURIComponent(JSON.stringify(response))}')" class="text-indigo-600 hover:text-indigo-900">View Details</button>
                </td>
            `;
            responseTableBody.appendChild(row);
        });
    }

    /**
     * Filters the user response data based on selected criteria and re-renders the table.
     */
    function filterResponses() {
        const selectedUser = filterUserSelect.value;
        const selectedResponseType = filterResponseTypeSelect.value;
        const selectedStatus = filterStatusSelect.value;

        const filteredData = userResponsesData.filter(response => {
            const matchesUser = selectedUser === 'All' || `${response.user_name} (${response.user_id})` === selectedUser;
            const matchesResponseType = selectedResponseType === 'All' || response.response_type === selectedResponseType;
            const matchesStatus = selectedStatus === 'All' || response.status === selectedStatus;
            return matchesUser && matchesResponseType && matchesStatus;
        });

        renderResponseTable(filteredData);
    }

    // Event listeners for filter changes
    filterUserSelect.addEventListener('change', filterResponses);
    filterResponseTypeSelect.addEventListener('change', filterResponses);
    filterStatusSelect.addEventListener('change', filterResponses);

    // Initial render of the table when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        renderResponseTable(userResponsesData);

        // Get elements for Response Details Modal
        const detailsModal = document.getElementById('detailsModal');
        const modalResponseId = document.getElementById('modalResponseId');
        const modalUser = document.getElementById('modalUser');
        const modalResponseType = document.getElementById('modalResponseType');
        const modalTimestamp = document.getElementById('modalTimestamp');
        const modalStatus = document.getElementById('modalStatus');
        const modalMessageContent = document.getElementById('modalMessageContent');
        const modalDetails = document.getElementById('modalDetails');
        const closeDetailsModal = document.getElementById('closeDetailsModal');

        /**
         * Opens the response details modal with the given response log's data.
         * @param {string} responseJson - JSON string of the response log entry.
         */
        window.viewResponseDetails = function(responseJson) {
            const response = JSON.parse(decodeURIComponent(responseJson));
            modalResponseId.textContent = response.response_id;
            modalUser.textContent = `${response.user_name} (${response.user_id})`;
            modalResponseType.textContent = response.response_type;
            modalTimestamp.textContent = response.timestamp || 'N/A';
            modalStatus.textContent = response.status;
            modalMessageContent.textContent = response.message_content || 'No message content provided.';
            modalDetails.textContent = response.details || 'No detailed information provided.';

            detailsModal.classList.remove('hidden');
        };

        // Close response details modal
        closeDetailsModal.addEventListener('click', function() {
            detailsModal.classList.add('hidden');
        });
    });
</script>
