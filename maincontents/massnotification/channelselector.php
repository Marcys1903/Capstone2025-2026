<?php
// --- PHP PLACEHOLDER LOGIC ---
// Assume user is logged in for demonstration
$isLoggedIn = true;
$userName = "Admin Marcus";
$userProfilePic = ""; // Set to empty string for no picture, or a valid URL
$hasProfilePic = !empty($userProfilePic);

// Placeholder for channel health and estimated reach (in a real app, these would come from an API)
$channelStatus = [
    'sms' => ['status' => 'Online', 'reach' => '1,200,000'],
    'email' => ['status' => 'Online', 'reach' => '850,000'],
    'pa_system' => ['status' => 'Online', 'reach' => 'Selected Zones'],
];

// Placeholder for PA System Zones (in a real app, these would be dynamic)
$paZones = [
    'zone_a' => 'Barangay Center A',
    'zone_b' => 'School Auditorium',
    'zone_c' => 'Public Market',
    'zone_d' => 'Emergency Operations Center'
];
// --- END PHP PLACEHOLDER LOGIC ---
?>

<div class=" text-gray-800">
    <header class="mb-6 pb-4 border-b border-gray-300 bg-gray-700 text-white px-8 py-6 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">Channel Selector</h1>

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
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Choose Your Communication Channels</h2>
        <p class="text-gray-700 leading-relaxed">
            Select the most effective channels to disseminate your alert messages. This module allows you to choose between SMS, Email, and Public Address (PA) Systems, configure channel-specific settings, and monitor their real-time health.
        </p>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Select Channels & Monitor Status</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="border border-gray-200 rounded-lg p-5 shadow-sm bg-gray-50">
                <label for="channel_sms" class="flex items-center cursor-pointer mb-3">
                    <input type="checkbox" id="channel_sms" name="channels[]" value="sms" class="form-checkbox h-5 w-5 text-blue-600 rounded">
                    <span class="ml-3 text-xl font-semibold text-gray-800">SMS</span>
                </label>
                <p class="text-sm text-gray-600 mb-2">Estimated Reach: <span class="font-semibold"><?php echo htmlspecialchars($channelStatus['sms']['reach']); ?></span></p>
                <div class="flex items-center text-sm">
                    Status:
                    <span class="ml-2 font-semibold
                        <?php
                            if ($channelStatus['sms']['status'] === 'Online') echo 'text-green-600';
                            elseif ($channelStatus['sms']['status'] === 'Delayed') echo 'text-yellow-600';
                            else echo 'text-red-600';
                        ?>
                    "><?php echo htmlspecialchars($channelStatus['sms']['status']); ?></span>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg p-5 shadow-sm bg-gray-50">
                <label for="channel_email" class="flex items-center cursor-pointer mb-3">
                    <input type="checkbox" id="channel_email" name="channels[]" value="email" class="form-checkbox h-5 w-5 text-blue-600 rounded">
                    <span class="ml-3 text-xl font-semibold text-gray-800">Email</span>
                </label>
                <p class="text-sm text-gray-600 mb-2">Estimated Reach: <span class="font-semibold"><?php echo htmlspecialchars($channelStatus['email']['reach']); ?></span></p>
                <div class="flex items-center text-sm">
                    Status:
                    <span class="ml-2 font-semibold
                        <?php
                            if ($channelStatus['email']['status'] === 'Online') echo 'text-green-600';
                            elseif ($channelStatus['email']['status'] === 'Delayed') echo 'text-yellow-600';
                            else echo 'text-red-600';
                        ?>
                    "><?php echo htmlspecialchars($channelStatus['email']['status']); ?></span>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg p-5 shadow-sm bg-gray-50">
                <label for="channel_pa_system" class="flex items-center cursor-pointer mb-3">
                    <input type="checkbox" id="channel_pa_system" name="channels[]" value="pa_system" class="form-checkbox h-5 w-5 text-blue-600 rounded">
                    <span class="ml-3 text-xl font-semibold text-gray-800">PA System</span>
                </label>
                <p class="text-sm text-gray-600 mb-2">Estimated Reach: <span class="font-semibold"><?php echo htmlspecialchars($channelStatus['pa_system']['reach']); ?></span></p>
                <div class="flex items-center text-sm">
                    Status:
                    <span class="ml-2 font-semibold
                        <?php
                            if ($channelStatus['pa_system']['status'] === 'Online') echo 'text-green-600';
                            elseif ($channelStatus['pa_system']['status'] === 'Delayed') echo 'text-yellow-600';
                            else echo 'text-red-600';
                        ?>
                    "><?php echo htmlspecialchars($channelStatus['pa_system']['status']); ?></span>
                </div>
            </div>
        </div>
    </section>

    <section class="p-8 bg-white rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Channel-Specific Settings</h2>

        <div id="sms_settings" class="border border-blue-200 rounded-lg p-5 shadow-sm bg-blue-50 mb-6 hidden">
            <h3 class="text-xl font-semibold text-blue-800 mb-4">SMS Settings</h3>
            <div class="mb-4">
                <label for="sms_short_link" class="block text-sm font-medium text-gray-700 mb-1">Include Short Link to Full Message (Optional)</label>
                <input type="text" id="sms_short_link" class="mt-1 block w-full md:w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="e.g., https://bit.ly/full-alert">
                <p class="text-xs text-gray-500 mt-1">Useful for long messages that exceed SMS character limits. Full content can be accessed via this link.</p>
            </div>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" id="sms_truncate_long" class="form-checkbox h-4 w-4 text-blue-600 rounded">
                    <span class="ml-2 text-gray-700">Truncate long SMS messages and rely on short link</span>
                </label>
            </div>
        </div>

        <div id="email_settings" class="border border-green-200 rounded-lg p-5 shadow-sm bg-green-50 mb-6 hidden">
            <h3 class="text-xl font-semibold text-green-800 mb-4">Email Settings</h3>
            <div class="mb-4">
                <label for="email_attachments" class="block text-sm font-medium text-gray-700 mb-1">Attachments (Optional)</label>
                <input type="file" id="email_attachments" multiple class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                <p class="text-xs text-gray-500 mt-1">Attach relevant documents (e.g., evacuation maps, official advisories).</p>
            </div>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" id="email_high_importance" class="form-checkbox h-4 w-4 text-green-600 rounded">
                    <span class="ml-2 text-gray-700">Mark as High Importance</span>
                </label>
            </div>
        </div>

        <div id="pa_system_settings" class="border border-purple-200 rounded-lg p-5 shadow-sm bg-purple-50 mb-6 hidden">
            <h3 class="text-xl font-semibold text-purple-800 mb-4">PA System Settings</h3>
            <div class="mb-4">
                <label for="pa_zones" class="block text-sm font-medium text-gray-700 mb-1">Select PA Zones:</label>
                <select id="pa_zones" multiple class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm h-32">
                    <?php foreach ($paZones as $zoneId => $zoneName) : ?>
                        <option value="<?php echo htmlspecialchars($zoneId); ?>"><?php echo htmlspecialchars($zoneName); ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="text-xs text-gray-500 mt-1">Select specific areas where the public address announcement will be broadcasted.</p>
            </div>
            <div class="mb-4">
                <label for="pa_volume" class="block text-sm font-medium text-gray-700 mb-1">Volume Level:</label>
                <input type="range" id="pa_volume" min="0" max="100" value="75" class="mt-1 w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                <div class="flex justify-between text-xs text-gray-500"><span>0%</span><span>50%</span><span>100%</span></div>
            </div>
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" id="pa_live_broadcast" class="form-checkbox h-4 w-4 text-purple-600 rounded">
                    <span class="ml-2 text-gray-700">Enable Live Microphone Broadcast (Overrides pre-recorded audio)</span>
                </label>
                <p class="text-xs text-gray-500 mt-1">If checked, the system will use live audio input instead of an uploaded file.</p>
            </div>
        </div>
    </section>

    <div class="flex justify-end space-x-4 mt-6">
        <button type="button" class="inline-flex justify-center py-2 px-6 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
            Cancel
        </button>
        <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
            Save Channel Settings
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const smsCheckbox = document.getElementById('channel_sms');
    const emailCheckbox = document.getElementById('channel_email');
    const paSystemCheckbox = document.getElementById('channel_pa_system');

    const smsSettings = document.getElementById('sms_settings');
    const emailSettings = document.getElementById('email_settings');
    const paSystemSettings = document.getElementById('pa_system_settings');

    function toggleChannelSettings() {
        smsSettings.classList.toggle('hidden', !smsCheckbox.checked);
        emailSettings.classList.toggle('hidden', !emailCheckbox.checked);
        paSystemSettings.classList.toggle('hidden', !paSystemCheckbox.checked);
    }

    // Add event listeners
    smsCheckbox.addEventListener('change', toggleChannelSettings);
    emailCheckbox.addEventListener('change', toggleChannelSettings);
    paSystemCheckbox.addEventListener('change', toggleChannelSettings);

    // Initial call to set visibility based on default checked state
    toggleChannelSettings();
});
</script>