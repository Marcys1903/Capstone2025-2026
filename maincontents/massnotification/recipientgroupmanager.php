<?php
// --- PHP PLACEHOLDER LOGIC ---
// Assume user is logged in for demonstration
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Set to empty string for no picture, or a valid URL
$hasProfilePic = !empty($userProfilePic);

// Placeholder for recipient groups (in a real app, these would come from a database)
$recipientGroups = [
    ['id' => 'all_users', 'name' => 'All Registered Users', 'count' => 1245],
    ['id' => 'barangay_a', 'name' => 'Barangay A Residents', 'count' => 350],
    ['id' => 'barangay_b', 'name' => 'Barangay B Residents', 'count' => 420],
    ['id' => 'emergency_responders', 'name' => 'Emergency Responders', 'count' => 55],
    ['id' => 'school_officials', 'name' => 'School Officials', 'count' => 30],
];
// --- END PHP PLACEHOLDER LOGIC ---
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipient Group Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.6); /* Black w/ opacity */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }
        .modal-content {
            background-color: #fefefe;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 90%;
            max-height: 90%;
            overflow-y: auto;
            position: relative;
        }
        .close-button {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 20px;
            cursor: pointer;
        }
        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-4 text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Recipient Group Manager</h1>

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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Organize Your Contacts</h2>
        <p class="text-gray-700 leading-relaxed">
            Efficiently manage and categorize your recipients into customizable groups. This allows for quick and accurate targeting of alerts based on various criteria such as location, role, or risk level.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Manage Recipient Groups</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($recipientGroups as $group) : ?>
                <div class="border border-gray-200 rounded-lg p-5 shadow-sm bg-gray-50 flex flex-col justify-between recipient-group-card" data-group-id="<?php echo htmlspecialchars($group['id']); ?>" data-group-name="<?php echo htmlspecialchars($group['name']); ?>" data-group-count="<?php echo htmlspecialchars($group['count']); ?>">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2"><?php echo htmlspecialchars($group['name']); ?></h3>
                        <p class="text-gray-600 text-sm">Members: <span class="font-bold"><?php echo number_format($group['count']); ?></span></p>
                    </div>
                    <div class="mt-4 flex space-x-3">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 edit-button">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            Edit
                        </button>
                        <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 view-members-button">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            View Members
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-8 flex justify-end space-x-4">
            <button id="create-new-group-button" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-1 mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Create New Group
            </button>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Import & Export Contacts</h2>
        <p class="text-gray-700 mb-4">
            Bulk import contacts from a CSV file or export existing group members.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="border border-gray-200 rounded-lg p-5 shadow-sm bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Import Contacts (CSV)</h3>
                <label for="csv_upload" class="block text-sm font-medium text-gray-700 mb-1">Upload CSV File</label>
                <input type="file" id="csv_upload" accept=".csv" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-xs text-gray-500 mt-2">Expected CSV format: Name, Phone Number, Email (optional), Group Name (optional)</p>
                <button id="import-csv-button" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Import
                </button>
            </div>

            <div class="border border-gray-200 rounded-lg p-5 shadow-sm bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Export Group</h3>
                <label for="export_group_select" class="block text-sm font-medium text-gray-700 mb-1">Select Group to Export</label>
                <select id="export_group_select" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">-- Choose a Group --</option>
                    <?php foreach ($recipientGroups as $group) : ?>
                        <option value="<?php echo htmlspecialchars($group['id']); ?>"><?php echo htmlspecialchars($group['name']); ?></option>
                    <?php endforeach; ?>
                </select>
                <button id="export-group-button" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Export CSV
                </button>
            </div>
        </div>
    </section>

    <div class="flex justify-end space-x-4 mt-6">
        <button type="button" id="cancel-button" class="inline-flex justify-center py-2 px-6 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
            Cancel
        </button>
        <button type="submit" id="save-changes-button" class="inline-flex justify-center py-2 px-6 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
            Save Changes
        </button>
    </div>
</div>

<div id="editGroupModal" class="modal">
    <div class="modal-content w-1/2">
        <span class="close-button">&times;</span>
        <h2 class="mb-4 text-2xl font-bold">Edit Group: <span id="editGroupName"></span></h2>
        <form>
            <div class="mb-4">
                <label for="editGroupId" class="block text-sm font-medium text-gray-700">Group ID</label>
                <input type="text" id="editGroupId" name="groupId" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm bg-gray-100 p-2">
            </div>
            <div class="mb-4">
                <label for="editGroupNameInput" class="block text-sm font-medium text-gray-700">Group Name</label>
                <input type="text" id="editGroupNameInput" name="groupName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2">
            </div>
            <div class="mb-6">
                <label for="editGroupCountInput" class="block text-sm font-medium text-gray-700">Number of Members</label>
                <input type="number" id="editGroupCountInput" name="groupCount" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2">
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" class="close-modal-button rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
                <button type="submit" class="rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<div id="viewMembersModal" class="modal">
    <div class="modal-content w-3/4">
        <span class="close-button">&times;</span>
        <h2 class="mb-4 text-2xl font-bold">Members of <span id="viewMembersGroupName"></span></h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Phone Number</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody id="membersTableBody" class="divide-y divide-gray-200 bg-white">
                    <tr>
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">John Doe</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">09123456789</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">john.doe@example.com</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a> |
                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">Jane Smith</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">09987654321</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">jane.smith@example.com</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a> |
                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="button" class="close-modal-button rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Close</button>
        </div>
    </div>
</div>

<div id="createNewGroupModal" class="modal">
    <div class="modal-content w-1/2">
        <span class="close-button">&times;</span>
        <h2 class="mb-4 text-2xl font-bold">Create New Group</h2>
        <form>
            <div class="mb-4">
                <label for="newGroupName" class="block text-sm font-medium text-gray-700">Group Name</label>
                <input type="text" id="newGroupName" name="newGroupName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" placeholder="e.g., Barangay C Residents">
            </div>
            <div class="mb-6">
                <label for="newGroupDescription" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                <textarea id="newGroupDescription" name="newGroupDescription" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2" placeholder="Brief description of this group"></textarea>
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" class="close-modal-button rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
                <button type="submit" class="rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Create Group</button>
            </div>
        </form>
    </div>
</div>

<div id="importCsvModal" class="modal">
    <div class="modal-content w-1/2">
        <span class="close-button">&times;</span>
        <h2 class="mb-4 text-2xl font-bold">Import Contacts from CSV</h2>
        <p class="mb-4 text-gray-700">Select a CSV file to upload. Ensure your file adheres to the specified format.</p>
        <div class="mb-4">
            <label for="importModalCsvUpload" class="block text-sm font-medium text-gray-700">Upload CSV File</label>
            <input type="file" id="importModalCsvUpload" accept=".csv" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100">
            <p class="mt-2 text-xs text-gray-500">Expected CSV format: Name, Phone Number, Email (optional), Group Name (optional)</p>
        </div>
        <div class="flex justify-end space-x-3">
            <button type="button" class="close-modal-button rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
            <button type="submit" class="rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Upload & Import</button>
        </div>
    </div>
</div>

<div id="exportGroupModal" class="modal">
    <div class="modal-content w-1/2">
        <span class="close-button">&times;</span>
        <h2 class="mb-4 text-2xl font-bold">Export Group to CSV</h2>
        <p class="mb-4 text-gray-700">Select a recipient group to export its members to a CSV file.</p>
        <div class="mb-4">
            <label for="exportModalGroupSelect" class="block text-sm font-medium text-gray-700">Select Group to Export</label>
            <select id="exportModalGroupSelect" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <option value="">-- Choose a Group --</option>
                <?php foreach ($recipientGroups as $group) : ?>
                    <option value="<?php echo htmlspecialchars($group['id']); ?>"><?php echo htmlspecialchars($group['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="flex justify-end space-x-3">
            <button type="button" class="close-modal-button rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
            <button type="submit" class="rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Export CSV</button>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to open a modal
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }

        // Function to close a modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Add event listeners to all close buttons within modals
        document.querySelectorAll('.modal .close-button, .modal .close-modal-button').forEach(button => {
            button.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) {
                    closeModal(modal.id);
                }
            });
        });

        // Close modal when clicking outside of modal content
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closeModal(modal.id);
                }
            });
        });


        // Handle "Edit" button
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.recipient-group-card');
                const groupId = card.dataset.groupId;
                const groupName = card.dataset.groupName;
                const groupCount = card.dataset.groupCount;

                document.getElementById('editGroupId').value = groupId;
                document.getElementById('editGroupName').textContent = groupName; // For display in modal title
                document.getElementById('editGroupNameInput').value = groupName;
                document.getElementById('editGroupCountInput').value = groupCount;
                openModal('editGroupModal');

                // In a real application, you would fetch group data here
            });
        });

        // Handle "View Members" button
        document.querySelectorAll('.view-members-button').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.recipient-group-card');
                const groupId = card.dataset.groupId;
                const groupName = card.dataset.groupName;

                document.getElementById('viewMembersGroupName').textContent = groupName;
                openModal('viewMembersModal');

                // Simulate fetching members data and populating the table
                const membersTableBody = document.getElementById('membersTableBody');
                // Clear existing members (if any from previous view)
                membersTableBody.innerHTML = '';

                // Placeholder for dynamic content
                // In a real app, you'd fetch data from an API based on groupId
                const simulatedMembers = [
                    { name: "John Doe", phone: "09123456789", email: "john.doe@example.com" },
                    { name: "Jane Smith", phone: "09987654321", email: "jane.smith@example.com" },
                    { name: "Peter Jones", phone: "09555123456", email: "peter.jones@example.com" }
                ];

                simulatedMembers.forEach(member => {
                    const row = membersTableBody.insertRow();
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${member.name}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${member.phone}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${member.email}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a> |
                            <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                        </td>
                    `;
                });
            });
        });

        // Handle "Create New Group" button
        const createNewGroupButton = document.getElementById('create-new-group-button');
        if (createNewGroupButton) {
            createNewGroupButton.addEventListener('click', function() {
                openModal('createNewGroupModal');
            });
        }

        // Handle "Import" button
        const importCsvButton = document.getElementById('import-csv-button');
        const csvUploadInput = document.getElementById('csv_upload'); // This is the original input outside the modal
        if (importCsvButton) { // Check if the button exists
            importCsvButton.addEventListener('click', function() {
                // You can add logic here to pre-fill the modal's file input or just open it.
                // For now, we just open the modal. The actual file handling will be inside the modal's form.
                openModal('importCsvModal');
            });
        }


        // Handle "Export CSV" button
        const exportGroupButton = document.getElementById('export-group-button');
        const exportGroupSelect = document.getElementById('export_group_select'); // This is the original select outside the modal
        if (exportGroupButton) { // Check if the button exists
            exportGroupButton.addEventListener('click', function() {
                // Pre-select the chosen group in the modal if one was selected
                const selectedGroupId = exportGroupSelect.value;
                if (selectedGroupId) {
                    document.getElementById('exportModalGroupSelect').value = selectedGroupId;
                } else {
                    document.getElementById('exportModalGroupSelect').value = ""; // Reset if none was chosen
                }
                openModal('exportGroupModal');
            });
        }

        // Handle "Cancel" button (main page button)
        const cancelButton = document.getElementById('cancel-button');
        if (cancelButton) {
            cancelButton.addEventListener('click', function() {
                alert('Changes cancelled. (In a real app, this might redirect or reset form.)');
                // Example: window.history.back(); // Go back to the previous page
            });
        }

        // Handle "Save Changes" button (main page button)
        const saveChangesButton = document.getElementById('save-changes-button');
        if (saveChangesButton) {
            saveChangesButton.addEventListener('click', function() {
                alert('Saving all changes on the page... (In a real app, this would submit data to server.)');
                // In a real application, this would collect all form data and send it to the server
                // fetch('/save-settings.php', {
                //     method: 'POST',
                //     body: JSON.stringify({ /* your data here */ }),
                //     headers: { 'Content-Type': 'application/json' }
                // })
                // .then(response => response.json())
                // .then(data => alert('Save successful!'))
                // .catch(error => alert('Save failed!'));
            });
        }
    });
</script>

</body>
</html>