

### **১. প্রজেক্ট সেটআপ (Initial Setup)**

* কোড এডিটরে (যেমন: VS Code) নতুন ফোল্ডার ও ফাইল তৈরি করা।
* HTML ফাইলে বেসিক বয়লারপ্লেট কোড জেনারেট করা।
* জাভাস্ক্রিপ্ট লেখার জন্য বডি ট্যাগের ভেতরে `<script>` ট্যাগের ব্যবহার।

### **২. জাভাস্ক্রিপ্ট সিনট্যাক্স ও সেমিকোলন (Basic Syntax)**

* স্টেটমেন্টের শেষে সেমিকোলন (`;`) ব্যবহারের নিয়ম।
* জাভাস্ক্রিপ্টে সেমিকোলন না দিলেও অনেক সময় কাজ করে, তবে একই লাইনে দুটি কোড লিখলে এটি বাধ্যতামূলক।

### **৩. আউটপুট দেখানোর ৪টি পদ্ধতি (4 Ways to Show Output)**

| পদ্ধতি | সিনট্যাক্স | ব্যবহারের ক্ষেত্র |
| --- | --- | --- |
| **Document Write** | `document.write("Text")` | সরাসরি ব্রাউজার উইন্ডোতে কিছু প্রিন্ট করার জন্য। |
| **Console Log** | `console.log("Text")` | ডেভেলপার টুল বা কনসোলে ডিবাগিংয়ের জন্য। |
| **Alert Box** | `window.alert("Text")` | ব্যবহারকারীকে পপ-আপ মেসেজ বা সতর্কবার্তা দেখানোর জন্য। |
| **Inner HTML** | `document.getElementById("id").innerHTML` | নির্দিষ্ট কোনো HTML এলিমেন্টের ভেতরে ডেটা দেখানোর জন্য। |

### **৪. বিস্তারিত আলোচনা ও ব্যবহার (Detailed Discussion)**

* **Console.log:** ব্রাউজারে রাইট ক্লিক করে 'Inspect' > 'Console' এ গিয়ে কীভাবে আউটপুট চেক করতে হয়।
* **Window vs Alert:** `window.alert()` এবং শুধু `alert()` এর মধ্যে পার্থক্য (উভয়ই একই কাজ করে)।
* **DOM Manipulation (ID ভিত্তিক):** HTML-এ একটি ID তৈরি করে (`<h1 id="output">`) জাভাস্ক্রিপ্ট থেকে সেই ID-তে টেক্সট পাঠানো।

### **৫. প্র্যাকটিক্যাল উদাহরণ (Code Samples)**

* **উদাহরণ ১:** `document.write("JavaScript");`
* **উদাহরণ ২:** `console.log("JavaScript is a programming language");`
* **উদাহরণ ৩:** `alert("Welcome to JS Tutorial");`
* **উদাহরণ ৪:** `document.getElementById("output").innerHTML = "Client Side Language";`
