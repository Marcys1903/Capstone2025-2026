<?php
// --- PHP PLACEHOLDER LOGIC ---
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Placeholder for user profile picture URL

// Sample escalation rules
$escalationRules = [
    [
        'id' => 'ESC-001',
        'name' => 'Critical Alert No Delivery',
        'trigger' => 'Critical alert not delivered within 5 mins',
        'action' => 'Notify Emergency Management Team via SMS/Email',
        'status' => 'Active'
    ],
    [
        'id' => 'ESC-002',
        'name' => 'High Severity Unread',
        'trigger' => 'High severity email unread after 30 mins',
        'action' => 'Send follow-up SMS to recipient',
        'status' => 'Active'
    ],
    [
        'id' => 'ESC-003',
        'name' => 'Incident Report Unvalidated',
        'trigger' => 'Incident report pending validation for 1 hour',
        'action' => 'Send reminder to Admin Team Lead',
        'status' => 'Inactive'
    ],
];
?>
<div class="text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Escalation Trigger System</h1>
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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Define Rules for Alert Escalation</h2>
        <p class="text-gray-700 leading-relaxed">
            Set up automated rules to escalate alerts or incidents if predefined conditions are met (e.g., message not delivered, no response received). This ensures critical issues receive timely attention.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Manage Escalation Rules</h2>
        <div class="mb-6 text-right">
            <button onclick="openEscalationModal('new')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Create New Rule
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rule Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Trigger Condition</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Escalation Action</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($escalationRules)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No escalation rules defined.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($escalationRules as $rule) : ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo htmlspecialchars($rule['name']); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?php echo htmlspecialchars($rule['trigger']); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?php echo htmlspecialchars($rule['action']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        <?php echo ($rule['status'] === 'Active') ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                        <?php echo htmlspecialchars($rule['status']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="openEscalationModal('edit', '<?php echo htmlspecialchars(json_encode($rule)); ?>')" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</button>
                                    <button onclick="toggleEscalationStatus('<?php echo htmlspecialchars($rule['id']); ?>', '<?php echo htmlspecialchars($rule['status']); ?>')" class="text-yellow-600 hover:text-yellow-900 mr-4">Toggle Status</button>
                                    <button onclick="deleteEscalationRule('<?php echo htmlspecialchars($rule['id']); ?>')" class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <div id="escalationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
            <h3 class="text-xl font-bold mb-4" id="escalationModalTitle">Create New Escalation Rule</h3>
            <form id="escalationRuleForm" onsubmit="return saveEscalationRule()">
                <input type="hidden" id="escalationRuleId">
                <div class="mb-4">
                    <label for="ruleName" class="block text-sm font-medium text-gray-700">Rule Name</label>
                    <input type="text" id="ruleName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="triggerCondition" class="block text-sm font-medium text-gray-700">Trigger Condition</label>
                    <textarea id="triggerCondition" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., Critical alert not delivered within 5 mins" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="escalationAction" class="block text-sm font-medium text-gray-700">Escalation Action</label>
                    <textarea id="escalationAction" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., Notify Emergency Management Team via SMS/Email" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="ruleStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="ruleStatus" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeEscalationModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Save Rule
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let currentEscalationRules = <?php echo json_encode($escalationRules); ?>;

    window.openEscalationModal = function(mode, ruleData = null) {
        const modal = document.getElementById('escalationModal');
        const title = document.getElementById('escalationModalTitle');
        const ruleIdField = document.getElementById('escalationRuleId');
        const ruleNameField = document.getElementById('ruleName');
        const triggerConditionField = document.getElementById('triggerCondition');
        const escalationActionField = document.getElementById('escalationAction');
        const ruleStatusField = document.getElementById('ruleStatus');

        if (mode === 'new') {
            title.textContent = 'Create New Escalation Rule';
            ruleIdField.value = '';
            ruleNameField.value = '';
            triggerConditionField.value = '';
            escalationActionField.value = '';
            ruleStatusField.value = 'Active';
        } else if (mode === 'edit' && ruleData) {
            const rule = JSON.parse(ruleData);
            title.textContent = 'Edit Escalation Rule';
            ruleIdField.value = rule.id;
            ruleNameField.value = rule.name;
            triggerConditionField.value = rule.trigger;
            escalationActionField.value = rule.action;
            ruleStatusField.value = rule.status;
        }
        modal.classList.remove('hidden');
    };

    window.closeEscalationModal = function() {
        document.getElementById('escalationModal').classList.add('hidden');
    };

    window.saveEscalationRule = function() {
        const ruleId = document.getElementById('escalationRuleId').value;
        const ruleName = document.getElementById('ruleName').value;
        const triggerCondition = document.getElementById('triggerCondition').value;
        const escalationAction = document.getElementById('escalationAction').value;
        const ruleStatus = document.getElementById('ruleStatus').value;

        const newRuleData = {
            id: ruleId || 'ESC-' + (currentEscalationRules.length + 1).toString().padStart(3, '0'), // Simple ID generation
            name: ruleName,
            trigger: triggerCondition,
            action: escalationAction,
            status: ruleStatus
        };

        if (ruleId) {
            // Update existing rule
            const index = currentEscalationRules.findIndex(r => r.id === ruleId);
            if (index !== -1) {
                currentEscalationRules[index] = newRuleData;
                alert('Escalation rule \"' + ruleName + '\" updated successfully!');
            }
        } else {
            // Add new rule
            currentEscalationRules.push(newRuleData);
            alert('Escalation rule \"' + ruleName + '\" created successfully!');
        }

        console.log('Saved/Updated Escalation Rule:', newRuleData);
        closeEscalationModal();
        location.reload(); // Simple reload for demonstration
        return false;
    }

    window.toggleEscalationStatus = function(ruleId, currentStatus) {
        const newStatus = (currentStatus === 'Active') ? 'Inactive' : 'Active';
        if (confirm(`Are you sure you want to ${newStatus} escalation rule ${ruleId}?`)) {
            console.log(`Toggling status for rule ${ruleId} to ${newStatus}`);
            // Simulate update
            const index = currentEscalationRules.findIndex(r => r.id === ruleId);
            if (index !== -1) {
                currentEscalationRules[index].status = newStatus;
                alert(`Rule ${ruleId} is now ${newStatus}.`);
            }
            location.reload(); // Simple reload for demonstration
        }
    };

    window.deleteEscalationRule = function(ruleId) {
        if (confirm('Are you sure you want to delete this escalation rule? This action cannot be undone.')) {
            // Simulate deletion
            currentEscalationRules = currentEscalationRules.filter(r => r.id !== ruleId);
            alert('Escalation rule ' + ruleId + ' deleted.');
            console.log('Deleted Rule ID:', ruleId);
            location.reload(); // Simple reload for demonstration
        }
    };
</script>