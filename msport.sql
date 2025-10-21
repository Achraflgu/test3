-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2025 at 08:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `admin_photo` text DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL,
  `admin_job` varchar(100) DEFAULT NULL,
  `admin_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_photo`, `admin_email`, `admin_password`, `admin_job`, `admin_phone`) VALUES
(1, 'admin', 'uploads/6f2dd748744859a41b07aad191f704a6.jpg', 'admin1@gmail.com', '123', 'Administrator', '29814582'),
(3, 'admin', 'uploads/332560176_707200001098413_3325798184920807725_n.jpg', 'admin2@gmail.com', '123', 'Admin Job 2', '12412312'),
(6, 'AZD', 'uploads/6d4a575327f41b79c5f6b812f94ddc65.jpg', 'admin@azd.com', '123', 'admin213', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `image_src` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `image_src`, `alt_text`, `link`) VALUES
(1, 'assets/images/banner-img/10.png', 'Banner 1', 'http://localhost/msport/shop.php'),
(2, 'assets/images/banner-img/11.png', 'Banner 2', 'http://localhost/msport/shop.php');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `name_blog` varchar(255) DEFAULT NULL,
  `photo_blog` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `name_blog`, `photo_blog`, `content`, `date_posted`, `status`) VALUES
(1, 'Fuel Your Workouts: Best Pre-Workout Snacks', 'https://images.pexels.com/photos/396133/pexels-photo-396133.jpeg', '<p>Fueling your body with the right nutrients before a workout can enhance performance and recovery. Here are the best pre-workout snacks to try before your next session at Spark Gym:</p><h3>1. Banana and Peanut Butter</h3><img src=\"https://images.pexels.com/photos/396133/pexels-photo-396133.jpeg\" alt=\"Banana and Peanut Butter\" style=\"width:100%; height:auto;\"><p>This combination provides a good balance of carbohydrates and protein for sustained energy.</p><h3>2. Greek Yogurt and Berries</h3><video width=\"100%\" controls><source src=\"https://example.com/greek_yogurt_berries.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Greek yogurt is rich in protein, while berries add natural sugars and antioxidants.</p><h3>3. Oatmeal with Almonds</h3><p>Oatmeal is a great source of complex carbs, and almonds add healthy fats and protein.</p><img src=\"https://images.pexels.com/photos/396133/pexels-photo-396133.jpeg\" alt=\"Oatmeal with Almonds\" style=\"width:100%; height:auto;\"><h3>4. Apple Slices with Cheese</h3><p>This snack offers a mix of carbohydrates, protein, and fat for a balanced energy boost.</p><iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/DEF67890\" title=\"Apple Slices with Cheese\"></iframe><h3>5. Smoothie</h3><p>A smoothie made with fruit, protein powder, and spinach can be a quick and nutritious pre-workout option.</p><video width=\"100%\" controls><source src=\"https://example.com/smoothie.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>These snacks will help fuel your workouts and improve performance. Join us at Spark Gym for personalized nutrition advice and more pre-workout snack ideas.</p>', '2024-05-25 12:13:35', 1),
(2, '10 Benefits of Regular Exercise at Spark Gym', 'https://images.pexels.com/photos/8662457/pexels-photo-8662457.jpeg', '<p>Exercise isn\'t just about weight loss. At Spark Gym, we believe in the holistic benefits of fitness. Regular exercise can improve mental health, boost energy levels, and enhance overall well-being. Here are ten reasons to make regular workouts part of your routine:</p><ul><li><strong>Improved mood and mental health:</strong> Exercise releases endorphins, which help reduce stress and anxiety.</li><li><strong>Increased energy levels:</strong> Regular physical activity can boost your endurance and energy.</li><li><strong>Better sleep quality:</strong> Exercise helps regulate your sleep patterns for a more restful night.</li><li><strong>Enhanced muscle strength and tone:</strong> Build and tone muscles through strength training and cardio.</li><li><strong>Weight management:</strong> Maintain a healthy weight with regular exercise and a balanced diet.</li><li><strong>Reduced risk of chronic diseases:</strong> Lower your risk of heart disease, diabetes, and more.</li><li><strong>Better cardiovascular health:</strong> Improve heart health with aerobic exercises like running and cycling.</li><li><strong>Improved flexibility and mobility:</strong> Stretching exercises enhance your flexibility and prevent injuries.</li><li><strong>Stronger immune system:</strong> Regular activity can boost your immune system and help fight illnesses.</li><li><strong>Social benefits of group classes:</strong> Connect with others and stay motivated in group fitness sessions.</li></ul><p>Join us at Spark Gym and start experiencing these benefits today!</p>', '2024-05-24 22:52:43', 1),
(3, 'The Ultimate Guide to HIIT Workouts at Spark', 'https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg', '<p>High-Intensity Interval Training (HIIT) is one of the most efficient ways to burn calories and build muscle. At Spark Gym, we offer a variety of HIIT classes designed to push your limits and achieve maximum results in minimal time. Here\'s what you need to know about HIIT:</p><h3>What is HIIT?</h3><p>HIIT involves short bursts of intense exercise followed by brief recovery periods. This method keeps your heart rate up and burns more fat in less time.</p><h3>Benefits of HIIT</h3><ul><li><strong>Efficient calorie burning:</strong> HIIT workouts can burn a lot of calories in a short amount of time.</li><li><strong>Increased metabolism:</strong> Your metabolic rate stays higher for hours after a HIIT workout.</li><li><strong>Improved cardiovascular health:</strong> HIIT improves heart health and reduces blood pressure.</li><li><strong>Muscle building and fat loss:</strong> Build lean muscle while shedding body fat.</li><li><strong>Time-saving workouts:</strong> Get an effective workout in 30 minutes or less.</li></ul><p>Join a HIIT class at Spark Gym and experience the ultimate workout!</p>', '2024-05-24 22:52:55', 1),
(4, 'Yoga for Beginners: Start Your Journey at Spark', 'https://images.pexels.com/photos/1552249/pexels-photo-1552249.jpeg', '<p>Yoga is an excellent way to improve flexibility, strength, and mental clarity. At Spark Gym, we offer beginner-friendly yoga classes that are perfect for those new to the practice. Here\'s what you can expect:</p><h3>Why Yoga?</h3><p>Yoga combines physical postures, breathing exercises, and meditation to promote overall health and well-being. It\'s suitable for all fitness levels and can be adapted to meet individual needs.</p><h3>Benefits of Yoga</h3><ul><li><strong>Improved flexibility and balance:</strong> Regular practice helps increase flexibility and improve balance.</li><li><strong>Increased muscle strength:</strong> Yoga poses build muscle strength and endurance.</li><li><strong>Enhanced mental focus:</strong> Breathing exercises and meditation improve concentration and mental clarity.</li><li><strong>Stress reduction:</strong> Yoga promotes relaxation and reduces stress levels.</li><li><strong>Better posture:</strong> Regular practice helps improve posture and alignment.</li></ul><p>Our certified instructors will guide you through each pose, ensuring you gain the most from your practice. Join our yoga community at Spark Gym today!</p>', '2024-05-24 22:53:46', 1),
(5, 'Nutrition Tips for Maximizing Your Workout Results', 'https://images.pexels.com/photos/4050292/pexels-photo-4050292.jpeg', '<p>Exercise and nutrition go hand in hand when it comes to achieving your fitness goals. At Spark Gym, we believe in providing holistic support for our members. Here are some nutrition tips to help you maximize your workout results:</p><h3>Hydration is Key</h3><p>Drink plenty of water before, during, and after your workouts to stay hydrated and optimize performance.</p><h3>Pre-Workout Fuel</h3><p>Eat a balanced meal containing carbohydrates and protein about 1-2 hours before exercising to fuel your body and enhance endurance.</p><h3>Post-Workout Recovery</h3><p>Refuel with a combination of protein and carbohydrates within 30 minutes of completing your workout to aid muscle recovery and replenish glycogen stores.</p><h3>Healthy Snacking</h3><p>Choose nutrient-dense snacks like fruits, nuts, and yogurt to keep your energy levels up throughout the day.</p><h3>Balance is Key</h3><p>Aim for a balanced diet that includes a variety of whole foods to provide essential nutrients for overall health and fitness.</p><p>By following these nutrition tips, you can optimize your workouts and achieve your fitness goals faster. Join us at Spark Gym and let us support you on your journey to a healthier lifestyle!</p>', '2024-05-24 22:58:44', 1),
(6, 'The Importance of Rest Days in Your Fitness Routine', 'https://myacare.com/uploads/DoctorBlogs/952b6d70e53147ac8ef4283efb767735.png', '<p>While consistency is key to fitness success, rest days are equally important for overall health and performance. Here\'s why you should incorporate rest days into your fitness routine:</p><h3>Muscle Repair and Growth</h3><p>Rest days allow your muscles to repair and rebuild, leading to greater strength and muscle growth over time.</p><h3>Injury Prevention</h3><p>Overtraining can increase the risk of injury. Rest days give your body time to recover and reduce the likelihood of overuse injuries.</p><h3>Improved Performance</h3><p>Proper rest improves performance by preventing fatigue and allowing you to train at your best during workouts.</p><h3>Mental Refreshment</h3><p>Rest days provide mental refreshment, reducing stress and preventing burnout from excessive exercise.</p><h3>Balance and Sustainability</h3><p>A balanced approach to fitness includes regular rest days, promoting long-term sustainability and enjoyment of your fitness journey.</p><p>At Spark Gym, we emphasize the importance of rest and recovery as part of a balanced fitness routine. Join us and let\'s achieve your fitness goals together!</p>', '2024-05-24 22:58:52', 1),
(7, 'Mindfulness Meditation: Enhance Your Well-Being at Spark Gym', 'https://www.onelifefitness.com/hs-fs/hubfs/Mindfulness%20Techniques%20for%20Fitness%20Enthusiasts%20.jpg?width=1344&height=768&name=Mindfulness%20Techniques%20for%20Fitness%20Enthusiasts%20.jpg', '<p>In addition to physical fitness, mental well-being is essential for overall health. At Spark Gym, we offer mindfulness meditation classes to help you reduce stress and improve your quality of life. Here\'s why you should incorporate mindfulness meditation into your routine:</p><h3>Stress Reduction</h3><p>Mindfulness meditation reduces stress by promoting relaxation and calmness, leading to improved mental clarity and focus.</p><h3>Emotional Regulation</h3><p>Regular practice of mindfulness meditation enhances emotional regulation, helping you manage negative emotions and cultivate positive ones.</p><h3>Improved Sleep</h3><p>Meditation promotes better sleep quality by calming the mind and reducing insomnia.</p><h3>Community Connection</h3><p>Mindfulness meditation classes provide an opportunity to connect with others in a supportive and nurturing environment, fostering a sense of community and belonging.</p><h3>Enhanced Self-Awareness</h3><p>Through mindfulness meditation, you develop greater self-awareness, enabling you to understand your thoughts, emotions, and behaviors more deeply.</p><h3>Overall Well-Being</h3><p>By incorporating mindfulness meditation into your routine, you can experience improved overall well-being, including greater happiness, satisfaction, and resilience.</p><p>Join us at Spark Gym and discover the transformative power of mindfulness meditation. Let\'s embark on a journey to enhance your physical and mental well-being together!</p>', '2024-05-24 22:59:42', 1),
(8, '5 HIIT Workouts to Burn Fat Fast at Spark Gym', 'https://images.pexels.com/photos/3757374/pexels-photo-3757374.jpeg', '<p>High-Intensity Interval Training (HIIT) is one of the most effective ways to burn fat and improve cardiovascular fitness. At Spark Gym, we offer a variety of HIIT classes tailored to different fitness levels. Here are five HIIT workouts you can try:</p><h3>1. Full-Body HIIT</h3><video width=\"100%\" controls><source src=\"https://example.com/full_body_hiit.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>This workout includes exercises like burpees, mountain climbers, and jumping jacks to target all major muscle groups.</p><h3>2. Cardio HIIT</h3><p>This session focuses on high-energy cardio moves such as sprint intervals and high knees.</p><img src=\"https://images.pexels.com/photos/3757374/pexels-photo-3757374.jpeg\" alt=\"Cardio HIIT\" style=\"width:100%; height:auto;\"><h3>3. Strength HIIT</h3><iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/dkBweFb-zvc\" title=\"Strength HIIT Workout\"></iframe><p>Combine strength training with HIIT by using weights for exercises like squats and lunges.</p><h3>4. Tabata</h3><p>A popular HIIT format where you work hard for 20 seconds and rest for 10 seconds, repeating for 4 minutes per exercise.</p><img src=\"https://images.pexels.com/photos/3757374/pexels-photo-3757374.jpeg\" alt=\"Tabata HIIT\" style=\"width:100%; height:auto;\"><h3>5. Core HIIT</h3><p>Focus on your core with exercises like planks, Russian twists, and leg raises.</p><video width=\"100%\" controls><source src=\"https://example.com/core_hiit.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Join our HIIT classes at Spark Gym to experience these workouts and more. Burn fat, build muscle, and improve your overall fitness with our expert trainers.</p>', '2024-05-25 11:48:19', 1),
(9, 'Top 5 Yoga Poses for Flexibility', 'https://images.pexels.com/photos/3823061/pexels-photo-3823061.jpeg', '<p>Yoga is an excellent practice for improving flexibility and overall well-being. Here are the top five yoga poses we recommend at Spark Gym to enhance your flexibility:</p><h3>1. Downward-Facing Dog (Adho Mukha Svanasana)</h3><img src=\"https://images.pexels.com/photos/3823061/pexels-photo-3823061.jpeg\" alt=\"Downward-Facing Dog\" style=\"width:100%; height:auto;\"><p>This classic pose stretches the entire body, especially the hamstrings and calves.</p><h3>2. Child\'s Pose (Balasana)</h3><p>A gentle stretch for the back, hips, and thighs, Child\'s Pose is great for relaxation and flexibility.</p><video width=\"100%\" controls><source src=\"https://example.com/childs_pose.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><h3>3. Cobra Pose (Bhujangasana)</h3><p>Enhance your spine\'s flexibility with Cobra Pose, which also strengthens the back muscles.</p><iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/ehoMLA6uaKA\" title=\"Cobra Pose\"></iframe><h3>4. Triangle Pose (Trikonasana)</h3><p>Triangle Pose stretches the legs, hips, and spine, improving overall body flexibility.</p><img src=\"https://images.pexels.com/photos/3823061/pexels-photo-3823061.jpeg\" alt=\"Triangle Pose\" style=\"width:100%; height:auto;\"><h3>5. Pigeon Pose (Eka Pada Rajakapotasana)</h3><p>This deep hip opener is perfect for releasing tension and increasing hip flexibility.</p><video width=\"100%\" controls><source src=\"https://example.com/pigeon_pose.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Join our yoga classes at Spark Gym to learn these poses and more. Our expert instructors will guide you through each pose, helping you improve your flexibility and overall wellness.</p>', '2024-05-25 11:48:31', 1),
(10, 'The Importance of Strength Training for Women', 'https://images.pexels.com/photos/414029/pexels-photo-414029.jpeg', '<p>Strength training is crucial for women’s health, offering numerous benefits from improved muscle mass to enhanced mental well-being. Here are some reasons why women should incorporate strength training into their fitness routines at Spark Gym:</p><h3>1. Boosts Metabolism</h3><video width=\"100%\" controls><source src=\"https://example.com/metabolism_boost.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Strength training increases muscle mass, which in turn boosts your metabolism and helps burn more calories even at rest.</p><h3>2. Enhances Bone Health</h3><p>Weight-bearing exercises strengthen bones, reducing the risk of osteoporosis and fractures.</p><img src=\"https://images.pexels.com/photos/414029/pexels-photo-414029.jpeg\" alt=\"Enhancing Bone Health\" style=\"width:100%; height:auto;\"><h3>3. Improves Mental Health</h3><p>Regular strength training reduces symptoms of depression and anxiety, improving overall mental health.</p><iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/bs00kYupm3s\" title=\"Strength Training and Mental Health\"></iframe><h3>4. Promotes Functional Fitness</h3><p>Strength training enhances your ability to perform daily activities with ease, from lifting groceries to climbing stairs.</p><img src=\"https://images.pexels.com/photos/414029/pexels-photo-414029.jpeg\" alt=\"Functional Fitness\" style=\"width:100%; height:auto;\"><h3>5. Supports Weight Management</h3><p>Building muscle helps maintain a healthy weight, supporting long-term weight management goals.</p><video width=\"100%\" controls><source src=\"https://example.com/weight_management.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Join our strength training classes at Spark Gym and experience these benefits firsthand. Our expert trainers will guide you through personalized workouts designed to meet your fitness goals.</p>', '2024-05-25 11:48:44', 1),
(11, '10-Minute Morning Stretch Routine to Start Your Day Right', 'https://images.pexels.com/photos/3757370/pexels-photo-3757370.jpeg', '<p>Starting your day with a stretch routine can set a positive tone and prepare your body for the day ahead. Here’s a quick 10-minute morning stretch routine you can try at Spark Gym:</p><h3>1. Neck Stretch</h3><img src=\"https://images.pexels.com/photos/3757370/pexels-photo-3757370.jpeg\" alt=\"Neck Stretch\" style=\"width:100%; height:auto;\"><p>Gently tilt your head towards your shoulder, holding for 15 seconds on each side.</p><h3>2. Shoulder Roll</h3><video width=\"100%\" controls><source src=\"https://example.com/shoulder_roll.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Roll your shoulders forward and backward to release tension and improve mobility.</p><h3>3. Cat-Cow Stretch</h3><p>Alternate between arching your back and dipping it downwards to stretch your spine.</p><img src=\"https://images.pexels.com/photos/3757370/pexels-photo-3757370.jpeg\" alt=\"Cat-Cow Stretch\" style=\"width:100%; height:auto;\"><h3>4. Forward Bend</h3><p>Bend forward at the hips, reaching for your toes to stretch your hamstrings and back.</p><iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/l_3TLhM1ZHw\" title=\"Forward Bend\"></iframe><h3>5. Seated Twist</h3><p>Sit with your legs extended and twist your torso to each side, holding for 15 seconds.</p><img src=\"https://images.pexels.com/photos/3757370/pexels-photo-3757370.jpeg\" alt=\"Seated Twist\" style=\"width:100%; height:auto;\"><p>Incorporate this stretch routine into your morning for increased flexibility, reduced muscle tension, and a great start to your day. Join our morning stretch classes at Spark Gym for guided sessions and additional tips.</p>', '2024-05-25 11:54:36', 1),
(12, 'Boost Your Energy with Our Midday Workout', 'https://images.pexels.com/photos/414029/pexels-photo-414029.jpeg', '<p>Feeling sluggish in the middle of the day? A quick workout at Spark Gym can boost your energy and improve your focus. Here’s a 30-minute midday workout routine to get you moving:</p><h3>1. Warm-Up: Jumping Jacks</h3><img src=\"https://images.pexels.com/photos/414029/pexels-photo-414029.jpeg\" alt=\"Jumping Jacks\" style=\"width:100%; height:auto;\"><p>Start with 5 minutes of jumping jacks to get your heart rate up.</p><h3>2. Strength Circuit</h3><video width=\"100%\" controls><source src=\"https://example.com/strength_circuit.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Perform each exercise for 45 seconds with a 15-second rest in between:</p><ul><li>Push-Ups</li><li>Squats</li><li>Dumbbell Rows</li><li>Lunges</li><li>Plank</li></ul><h3>3. Cardio Burst: High Knees</h3><p>Do 2 minutes of high knees to keep your energy levels high.</p><img src=\"https://images.pexels.com/photos/414029/pexels-photo-414029.jpeg\" alt=\"High Knees\" style=\"width:100%; height:auto;\"><h3>4. Core Finisher</h3><iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/XYZ12345\" title=\"Core Workout\"></iframe><p>Finish with a 5-minute core workout:</p><ul><li>Bicycle Crunches</li><li>Leg Raises</li><li>Russian Twists</li><li>Mountain Climbers</li></ul><p>This midday workout will leave you feeling energized and ready to tackle the rest of your day. Visit Spark Gym for more workout routines and personalized fitness plans.</p>', '2024-05-25 11:54:44', 1),
(13, 'Top 5 Cardio Workouts for Weight Loss', 'https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg', '<p>If you’re looking to shed some pounds, incorporating cardio workouts into your fitness routine is essential. Here are the top 5 cardio workouts for weight loss that you can try at Spark Gym:</p><h3>1. Running</h3><img src=\"https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg\" alt=\"Running\" style=\"width:100%; height:auto;\"><p>Running is a high-intensity workout that burns a significant number of calories. Try interval running for better results.</p><video width=\"100%\" controls><source src=\"https://example.com/running.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><h3>2. Cycling</h3><p>Whether on a stationary bike or cycling outdoors, this workout is great for burning calories and improving cardiovascular health.</p><img src=\"https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg\" alt=\"Cycling\" style=\"width:100%; height:auto;\"><h3>3. Jump Rope</h3><p>Jumping rope is a fun and effective way to burn calories. It also improves coordination and agility.</p><iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/YmOZMsYh19I\" title=\"Jump Rope Workout\"></iframe><h3>4. Rowing</h3><p>Rowing is a full-body workout that can burn up to 600 calories per hour. It’s also low-impact, making it easy on the joints.</p><img src=\"https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg\" alt=\"Rowing\" style=\"width:100%; height:auto;\"><h3>5. High-Intensity Interval Training (HIIT)</h3><p>HIIT involves short bursts of intense exercise followed by rest periods. This workout can burn a lot of calories in a short amount of time.</p><video width=\"100%\" controls><source src=\"https://example.com/hiit.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Incorporate these cardio workouts into your routine at Spark Gym to maximize weight loss and improve overall fitness. Our trainers are here to help you achieve your fitness goals with personalized workout plans.</p>', '2024-05-25 11:54:56', 1),
(17, 'The Benefits of Strength Training for Women', 'https://images.pexels.com/photos/3757375/pexels-photo-3757375.jpeg', '<p>Strength training offers numerous benefits for women, from improving physical health to enhancing mental well-being. Here are some key benefits of strength training for women:</p><h3>1. Builds Lean Muscle Mass</h3><img src=\"https://images.pexels.com/photos/3757375/pexels-photo-3757375.jpeg\" alt=\"Lean Muscle\" style=\"width:100%; height:auto;\"><p>Strength training helps build lean muscle mass, which boosts metabolism and aids in weight management.</p><h3>2. Enhances Bone Density</h3><video width=\"100%\" controls><source src=\"https://example.com/bone_density.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Weight-bearing exercises increase bone density, reducing the risk of osteoporosis.</p><h3>3. Boosts Confidence</h3><p>Achieving strength goals can significantly boost self-esteem and confidence.</p><img src=\"https://images.pexels.com/photos/3757375/pexels-photo-3757375.jpeg\" alt=\"Confidence\" style=\"width:100%; height:auto;\"><h3>4. Improves Mental Health</p><p>Exercise releases endorphins, which can improve mood and reduce symptoms of anxiety and depression.</p><iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/GHI34567\" title=\"Mental Health Benefits\"></iframe><h3>5. Enhances Physical Performance</h3><p>Strength training improves overall physical performance, making everyday activities easier and more enjoyable.</p><video width=\"100%\" controls><source src=\"https://example.com/physical_performance.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Incorporating strength training into your fitness routine at Spark Gym can lead to significant improvements in both physical and mental health. Our trainers are here to guide you through personalized strength training programs designed specifically for women.</p>', '2024-05-25 12:16:10', 1),
(18, 'How to Stay Motivated on Your Fitness Journey', 'https://images.pexels.com/photos/669578/pexels-photo-669578.jpeg', '<p>Staying motivated on your fitness journey can be challenging, but with the right strategies, you can maintain your enthusiasm and achieve your goals. Here are some tips to stay motivated:</p><h3>1. Set Realistic Goals</h3><img src=\"https://images.pexels.com/photos/669578/pexels-photo-669578.jpeg\" alt=\"Setting Goals\" style=\"width:100%; height:auto;\"><p>Set achievable goals and celebrate small milestones along the way to keep yourself motivated.</p><h3>2. Find a Workout Buddy</h3><video width=\"100%\" controls><source src=\"https://example.com/workout_buddy.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Having a workout buddy can make exercising more enjoyable and keep you accountable.</p><h3>3. Mix Up Your Routine</h3><p>Prevent boredom by trying new workouts and switching up your routine regularly.</p><img src=\"https://images.pexels.com/photos/669578/pexels-photo-669578.jpeg\" alt=\"Mixing Up Routine\" style=\"width:100%; height:auto;\"><h3>4. Track Your Progress</p><p>Keep a fitness journal or use an app to track your workouts and monitor your progress.</p><iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/JKL89012\" title=\"Track Your Progress\"></iframe><h3>5. Reward Yourself</h3><p>Set up a reward system for reaching your fitness goals to stay motivated.</p><video width=\"100%\" controls><source src=\"https://example.com/reward_yourself.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>By implementing these strategies, you can stay motivated and continue to progress on your fitness journey. Join us at Spark Gym for a supportive community and expert guidance to help you stay on track.</p>', '2024-05-25 12:16:21', 1),
(19, 'Top 5 Cardio Workouts for Weight Loss', 'https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg', '<p>Cardio workouts are essential for weight loss and overall health. Here are the top 5 cardio workouts to help you shed pounds at Spark Gym:</p><h3>1. Running</h3><img src=\"https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg\" alt=\"Running\" style=\"width:100%; height:auto;\"><p>Running is an effective way to burn calories and improve cardiovascular health. Try intervals for added intensity.</p><h3>2. Jump Rope</h3><video width=\"100%\" controls><source src=\"https://example.com/jump_rope.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Jumping rope is a high-intensity workout that can burn a lot of calories in a short time.</p><h3>3. Cycling</h3><p>Whether on a stationary bike or outdoors, cycling is great for burning calories and building leg strength.</p><img src=\"https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg\" alt=\"Cycling\" style=\"width:100%; height:auto;\"><h3>4. Swimming</h3><p>Swimming provides a full-body workout and is easy on the joints, making it ideal for all fitness levels.</p><iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/MNO34567\" title=\"Swimming\"></iframe><h3>5. HIIT (High-Intensity Interval Training)</h3><p>HIIT involves short bursts of intense exercise followed by rest and is highly effective for burning calories and fat.</p><video width=\"100%\" controls><source src=\"https://example.com/hiit.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Incorporate these cardio workouts into your fitness routine at Spark Gym to achieve your weight loss goals. Our trainers are here to help you design an effective cardio plan tailored to your needs.</p>', '2024-05-25 12:16:28', 1),
(20, 'Benefits of Joining a Group Fitness Class', 'https://assets-global.website-files.com/6337e6fca669d810ab498d24/6512ed83262812789122f265_MoreThanAGym_imagesHeader-1020x680.png', '<p>Joining a group fitness class can enhance your workout experience and provide numerous benefits. Here’s why you should consider group fitness classes at Spark Gym:</p><h3>1. Motivation and Accountability</h3><img src=\"https://images.pexels.com/photos/999865/pexels-photo-999865.jpeg\" alt=\"Group Motivation\" style=\"width:100%; height:auto;\"><p>Working out with others can boost your motivation and keep you accountable.</p><h3>2. Structured Workouts</h3><video width=\"100%\" controls><source src=\"https://example.com/structured_workouts.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Classes are designed by professionals to provide balanced and effective workouts.</p><h3>3. Social Interaction</h3><p>Group fitness classes offer a great way to meet new people and make friends who share your fitness interests.</p><img src=\"https://images.pexels.com/photos/999865/pexels-photo-999865.jpeg\" alt=\"Social Interaction\" style=\"width:100%; height:auto;\"><h3>4. Variety and Fun</h3><p>With a wide range of classes available, you can keep your workouts exciting and fun.</p><iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/PQR45678\" title=\"Variety in Workouts\"></iframe><h3>5. Expert Guidance</h3><p>Instructors provide expert guidance, ensuring you perform exercises correctly and safely.</p><video width=\"100%\" controls><source src=\"https://example.com/expert_guidance.mp4\" type=\"video/mp4\">Your browser does not support the video tag.</video><p>Experience the benefits of group fitness classes at Spark Gym. Our diverse class offerings and experienced instructors are here to support you on your fitness journey.</p>', '2024-05-25 12:17:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogreviews`
--

CREATE TABLE `blogreviews` (
  `review_id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `review_content` text DEFAULT NULL,
  `date_posted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogreviews`
--

INSERT INTO `blogreviews` (`review_id`, `blog_id`, `customer_id`, `review_content`, `date_posted`) VALUES
(3, 17, 1, 'AA', '2024-05-30 13:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `brand_photo` text DEFAULT NULL,
  `brand_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_photo`, `brand_status`) VALUES
(1, 'Nike', 'uploads/29dfc6f05b80804c18913851a79c5140.png', 1),
(2, 'Adidas', 'uploads/892718ab333f14d55cdcb71c4e0d67a7.png', 1),
(3, 'Under Armour', 'uploads/under-armour7175.png', 1),
(6, 'Gymshark', 'uploads/communityIcon_6wbgk228rhy61.png', 1),
(7, 'Puma', 'uploads/1826deaf09eb8482461790d0c2e28dd4.png', 1),
(8, 'New Balance', 'uploads/d2cee1dab46c3b4152504c53cd325fbd.png', 1),
(9, 'Optimum Nutrition', 'uploads/optimum-nutrition9401.png', 1),
(10, 'MuscleTech', 'uploads/muscletech-238371.png', 1),
(11, 'MyProtein', 'uploads/d44ab3176870561.png', 1),
(12, 'Impact', 'uploads/images (1).png', 1),
(13, 'Rogue Fitness', 'uploads/images (2).png', 1),
(14, 'CAP Barbell', 'uploads/3fc81274aef4fce9c012ec53d8918d29.png', 1),
(15, 'PowerBlock', 'uploads/images.png', 1),
(16, 'NordicTrack', 'uploads/nordictrack.png', 1),
(17, 'Life Fitness', 'uploads/stsmall507x507-pad600x600f8f8f8.png', 1),
(18, 'TheraBand', 'uploads/brand.png', 1),
(19, 'Manduka', 'uploads/manduka6796.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `user_ip` varchar(45) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `customer_id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, NULL, 'aziz guemati', 'achrafgu92@gmail.com', 'azd', 'azd', '2024-05-12 22:33:28'),
(2, NULL, 'aziz guemati', 'achrafgu92@gmail.com', 'azd', 'azd', '2024-05-12 22:35:36'),
(3, 1, NULL, NULL, 'aa', 'aa', '2024-05-12 22:40:35'),
(4, 1, NULL, NULL, 'aa', 'aa', '2024-05-12 22:41:23'),
(5, 1, NULL, NULL, 'aa', 'aa', '2024-05-12 22:44:36'),
(6, 1, NULL, NULL, 'aa', 'aa', '2024-05-12 22:46:10'),
(7, 1, NULL, NULL, '1', '1', '2024-05-12 22:46:16'),
(8, NULL, 'aziz guemati', 'achrafgu92@gmail.com', 'aa', 'aa', '2024-05-30 10:55:38'),
(9, NULL, 'aziz guemati', 'achrafgu92@gmail.com', 'zz', 'zz', '2024-05-30 10:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(100) DEFAULT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `limit_usage` int(11) DEFAULT NULL,
  `usage_count` int(11) DEFAULT 0,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_name`, `coupon_code`, `discount`, `expiry_date`, `limit_usage`, `usage_count`, `product_id`) VALUES
(1, 'Spring Sale', 'AA', 19, '2026-05-11', 100, 22, NULL),
(2, 'Summer Discount', 'QQ', 10, '2024-08-01', 100, 26, NULL),
(27, 'Spark nj Time', 'SparkNJ', 50, '2024-06-01', 5, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cta_sections`
--

CREATE TABLE `cta_sections` (
  `id` int(11) NOT NULL,
  `bg_image` varchar(255) NOT NULL,
  `small_text` varchar(255) NOT NULL,
  `main_text` varchar(255) NOT NULL,
  `highlight_text` varchar(255) NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cta_sections`
--

INSERT INTO `cta_sections` (`id`, `bg_image`, `small_text`, `main_text`, `highlight_text`, `button_text`, `button_link`) VALUES
(1, 'assets/images/background/6.png', 'New Summer Collection 2024', 'Summer Vibes <br><span class=\\\"color-red\\\">Fresh</span> Styles', 'DecorA', 'EXPLORE NOW', 'http://localhost/msport/shop.php');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_password` varchar(100) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `customer_city` varchar(100) DEFAULT NULL,
  `customer_postal_code` varchar(20) DEFAULT NULL,
  `customer_country` varchar(100) DEFAULT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `customer_ip_address` varchar(45) DEFAULT NULL,
  `customers_photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_address`, `customer_city`, `customer_postal_code`, `customer_country`, `customer_phone`, `customer_ip_address`, `customers_photo`) VALUES
(1, 'aaz', 'John.Doe@Example.Com', '1234', 'rue', 'sss', '557', 'tn7', '44885577', '192.168.1.1', 'uploads/wallpaperflare.com_wallpaper (2).jpg'),
(2, 'Yassin Sakouki', 'ysakouki.11@gmail.com', '123', '456 Elm ', 'Othertown', '54321', 'Canada', '55879668', '10.0.0.1', 'uploads/default.jpg'),
(16, 'aziz guemati', 'achrafgu92@gmail.com', 'aaa', 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', 'Tunisia', '20204433', NULL, 'uploads/wallpaperflare.com_wallpaper (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_methods`
--

CREATE TABLE `delivery_methods` (
  `method_id` int(11) NOT NULL,
  `method_name` varchar(100) NOT NULL,
  `delivery_charge` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_methods`
--

INSERT INTO `delivery_methods` (`method_id`, `method_name`, `delivery_charge`) VALUES
(1, 'Collection in store - Sousse', 0.00),
(2, 'Collection in store - Drive-in', 0.00),
(3, 'Collection in store - Tunis', 0.00),
(4, 'Carrier - All of Tunisia', 7.00);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_url`) VALUES
(1, 'assets/images/instagram/1.jpg'),
(2, 'assets/images/instagram/2.jpg'),
(3, 'assets/images/instagram/3.jpg'),
(4, 'assets/images/instagram/4.jpg'),
(5, 'assets/images/instagram/5.jpg'),
(6, 'assets/images/instagram/6.jpg'),
(7, 'assets/images/instagram/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_emails`
--

CREATE TABLE `newsletter_emails` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter_emails`
--

INSERT INTO `newsletter_emails` (`id`, `email`, `created_at`) VALUES
(1, 'achraf@gmail.com', '2024-05-26 21:43:02'),
(2, 'achraf@gmail.com', '2024-05-26 21:43:36'),
(6, 'ysakouki.11@gmail.com', '2024-05-26 22:24:06'),
(7, 'achrafgu92@gmail.com', '2024-05-29 15:27:35'),
(8, 'AA@gmail.com', '2024-05-30 10:52:49'),
(9, 'achraf@gmail.com', '2024-05-31 03:14:56'),
(10, 'achrafgy@gmail.com', '2024-06-03 08:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(304, 214, 134, 1, 80.00),
(305, 215, 1, 5, 450.00),
(306, 215, 132, 1, 199.00),
(307, 215, 135, 1, 80.00),
(308, 215, 121, 1, 250.00),
(309, 215, 155, 1, 100.00),
(310, 216, 124, 1, 280.00),
(311, 217, 134, 1, 80.00),
(312, 218, 134, 1, 80.00),
(313, 219, 135, 2, 160.00),
(314, 219, 132, 11, 2189.00),
(315, 220, 134, 1, 80.00),
(316, 221, 134, 1, 80.00),
(317, 222, 133, 1, 80.00),
(318, 222, 128, 1, 499.00),
(319, 222, 163, 1, 100.00),
(320, 222, 121, 1, 250.00),
(321, 223, 2, 1, 150.00),
(322, 223, 128, 1, 499.00),
(323, 223, 134, 1, 80.00),
(324, 224, 134, 1, 80.00),
(325, 225, 5, 1, 70.00),
(326, 226, 135, 1, 59.00),
(327, 227, 169, 3, 300.00),
(328, 228, 136, 1, 69.00),
(329, 229, 134, 1, 80.00),
(330, 230, 134, 1, 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `payment_status` enum('pending-unpaid','pending-paid','complete','failed') DEFAULT NULL,
  `invoice_no` varchar(50) DEFAULT NULL,
  `order_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `total_amount`, `payment_status`, `invoice_no`, `order_note`) VALUES
(214, 1, '2024-05-29 16:47:10', 88, 'complete', 'INV66573feee122e', 'WAWA'),
(215, 1, '2024-05-30 03:19:41', 1040, 'pending-paid', 'INV6657d42d5259b', ''),
(216, 1, '2024-05-30 03:21:14', 288, 'failed', 'INV6657d48a9a5f2', ''),
(217, 1, '2024-05-30 03:22:50', 88, 'complete', 'INV6657d4eaaa486', ''),
(218, 1, '2024-05-30 03:28:17', 81, 'pending-unpaid', 'INV6657d6316322f', ''),
(219, 1, '2024-05-30 12:58:33', 2350, 'pending-unpaid', 'INV66585bd9710db', ''),
(220, 1, '2024-05-30 12:58:56', 88, 'pending-unpaid', 'INV66585bf0bb793', ''),
(221, 1, '2024-05-30 12:59:24', 88, 'pending-unpaid', 'INV66585c0cadbc4', ''),
(222, 1, '2024-05-31 00:25:09', 883, 'pending-unpaid', 'INV6658fcc5d96c2', ''),
(223, 2, '2024-05-31 05:16:31', 737, 'pending-unpaid', 'INV6659410f0a0b3', '00'),
(224, 2, '2024-05-31 05:17:18', 88, 'complete', 'INV6659413ea8d85', ''),
(225, 1, '2024-06-03 07:52:43', 78, 'pending-unpaid', 'INV665d5a2be2aff', ''),
(226, 1, '2024-06-03 07:54:33', 67, 'failed', 'INV665d5a999630e', ''),
(227, 1, '2024-06-03 10:56:32', 308, 'complete', 'INV665d8540ac9fc', ''),
(228, 2, '2024-06-04 09:38:19', 77, 'pending-unpaid', 'INV665ec46b8efce', ''),
(229, 2, '2024-06-04 09:39:06', 88, 'pending-unpaid', 'INV665ec49a8d68a', ''),
(230, 16, '2024-06-04 09:48:59', 88, 'pending-unpaid', 'INV665ec6eb77088', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `products_list` text DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `discount_total` decimal(10,2) DEFAULT NULL,
  `tax_stamp` decimal(10,2) DEFAULT NULL,
  `shipping` decimal(10,2) DEFAULT NULL,
  `delivery_method` varchar(100) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `products_list`, `subtotal`, `discount_total`, `tax_stamp`, `shipping`, `delivery_method`, `payment_method`, `total_amount`) VALUES
(214, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x ADAPT FLECK SEAMLESS LEGGINGS (black)</div><span class=\"price\" style=\"text-align: right;\">80 TND</span></li>', 80.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Direct bank transfer', 88.00),
(215, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">5 x WORKOUT STRINGER TANK TOP</div><span class=\"price\" style=\"text-align: right;\">450 TND</span></li><li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x Men\'s Project Rock Woven Red, White &amp; Blue Jacket</div><span class=\"price\" style=\"text-align: right;\">199 TND</span></li><li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x SWEAT SEAMLESS CROSS BACK SPORTS BRA</div><span class=\"price\" style=\"text-align: right;\">80 TND</span></li><li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x Nike Zoom Vomero 5</div><span class=\"price\" style=\"text-align: right;\"><del>250.00 TND</del> 202.5 TND</span></li><li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x Plant-Protein 100% pistache</div><span class=\"price\" style=\"text-align: right;\">100 TND</span></li>', 1079.00, 47.50, 1.00, 7.00, 'Carrier - All of Tunisia', 'Paypal', 1039.50),
(216, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x Nike P-6000 (blue)</div><span class=\"price\" style=\"text-align: right;\">280 TND</span></li>', 280.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Paypal', 288.00),
(217, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x ADAPT FLECK SEAMLESS LEGGINGS (black)</div><span class=\"price\" style=\"text-align: right;\">80 TND</span></li>', 80.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Cheque Payment', 88.00),
(218, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x ADAPT FLECK SEAMLESS LEGGINGS (black)</div><span class=\"price\" style=\"text-align: right;\">80 TND</span></li>', 80.00, 0.00, 1.00, 0.00, 'Collection in store - Tunis', 'Direct bank transfer', 81.00),
(219, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">2 x SWEAT SEAMLESS CROSS BACK SPORTS BRA</div><span class=\"price\" style=\"text-align: right;\">160 TND</span></li><li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">11 x Men\'s Project Rock Woven Red, White &amp; Blue Jacket</div><span class=\"price\" style=\"text-align: right;\">2189 TND</span></li>', 2349.00, 0.00, 1.00, 0.00, 'Collection in store - Tunis', 'Cheque Payment', 2350.00),
(220, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x ADAPT FLECK SEAMLESS LEGGINGS (black)</div><span class=\"price\" style=\"text-align: right;\">80 TND</span></li>', 80.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Direct bank transfer', 88.00),
(221, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x ADAPT FLECK SEAMLESS LEGGINGS (black)</div><span class=\"price\" style=\"text-align: right;\">80 TND</span></li>', 80.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Direct bank transfer', 88.00),
(222, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x ADAPT FLECK SEAMLESS LEGGINGS</div><span class=\"price\" style=\"text-align: right;\">80 TND</span></li><li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x FuelCell SuperComp Trainer v2</div><span class=\"price\" style=\"text-align: right;\">499 TND</span></li><li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x Fresh Foam X 1080 Utility</div><span class=\"price\" style=\"text-align: right;\">100 TND</span></li><li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x Nike Zoom Vomero 5 (white)</div><span class=\"price\" style=\"text-align: right;\"><del>250.00 TND</del> 202.5 TND</span></li>', 929.00, 47.50, 1.00, 0.00, 'Collection in store - Tunis', 'Direct bank transfer', 882.50),
(223, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x CROP TOP ADIDAS (black)</div><span class=\"price\" style=\"text-align: right;\">150 TND</span></li><li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x FuelCell SuperComp Trainer v2</div><span class=\"price\" style=\"text-align: right;\">499 TND</span></li><li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x ADAPT FLECK SEAMLESS LEGGINGS</div><span class=\"price\" style=\"text-align: right;\">80 TND</span></li>', 729.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Paypal', 737.00),
(224, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x ADAPT FLECK SEAMLESS LEGGINGS (black)</div><span class=\"price\" style=\"text-align: right;\">80 TND</span></li>', 80.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Cheque Payment', 88.00),
(225, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x AEROREADY T-SHIRT (white / xl)</div><span class=\"price\" style=\"text-align: right;\">70 TND</span></li>', 70.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Cheque Payment', 78.00),
(226, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x SWEAT SEAMLESS CROSS BACK SPORTS BRA</div><span class=\"price\" style=\"text-align: right;\">59 TND</span></li>', 59.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Direct bank transfer', 67.00),
(227, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">3 x SHOE DROP SET 2 (yellow)</div><span class=\"price\" style=\"text-align: right;\">300 TND</span></li>', 300.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Direct bank transfer', 308.00),
(228, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x ELEVATE LONGLINE SPORTS BRA</div><span class=\"price\" style=\"text-align: right;\">69 TND</span></li>', 69.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Direct bank transfer', 77.00),
(229, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x ADAPT FLECK SEAMLESS LEGGINGS (black / 2xl)</div><span class=\"price\" style=\"text-align: right;\">80 TND</span></li>', 80.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Cheque Payment', 88.00),
(230, '<li style=\"display: flex; justify-content: space-between;\"><div class=\"product-details\" style=\"flex: 1;\">1 x ADAPT FLECK SEAMLESS LEGGINGS (black / s)</div><span class=\"price\" style=\"text-align: right;\">80 TND</span></li>', 80.00, 0.00, 1.00, 7.00, 'Carrier - All of Tunisia', 'Direct bank transfer', 88.00);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `payment_date`, `amount`, `payment_method`, `transaction_id`) VALUES
(181, 214, '2024-05-29 16:47:10', 88.00, 'Direct bank transfer', NULL),
(182, 215, '2024-05-30 03:19:41', 1039.50, 'Paypal', NULL),
(183, 216, '2024-05-30 03:21:14', 288.00, 'Paypal', NULL),
(184, 217, '2024-05-30 03:22:50', 88.00, 'Cheque Payment', NULL),
(185, 218, '2024-05-30 03:28:17', 81.00, 'Direct bank transfer', NULL),
(186, 219, '2024-05-30 12:58:33', 2350.00, 'Cheque Payment', NULL),
(187, 220, '2024-05-30 12:58:56', 88.00, 'Direct bank transfer', NULL),
(188, 221, '2024-05-30 12:59:24', 88.00, 'Direct bank transfer', NULL),
(189, 222, '2024-05-31 00:25:09', 882.50, 'Direct bank transfer', NULL),
(190, 223, '2024-05-31 05:16:31', 737.00, 'Paypal', NULL),
(191, 224, '2024-05-31 05:17:18', 88.00, 'Cheque Payment', NULL),
(192, 225, '2024-06-03 07:52:43', 78.00, 'Cheque Payment', NULL),
(193, 226, '2024-06-03 07:54:33', 67.00, 'Direct bank transfer', NULL),
(194, 227, '2024-06-03 10:56:32', 308.00, 'Direct bank transfer', NULL),
(195, 228, '2024-06-04 09:38:19', 77.00, 'Direct bank transfer', NULL),
(196, 229, '2024-06-04 09:39:06', 88.00, 'Cheque Payment', NULL),
(197, 230, '2024-06-04 09:48:59', 88.00, 'Direct bank transfer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `method_id` int(11) NOT NULL,
  `method_name` varchar(100) NOT NULL,
  `icon_class` varchar(100) DEFAULT NULL,
  `method_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`method_id`, `method_name`, `icon_class`, `method_url`) VALUES
(4, 'Direct bank transfer', NULL, NULL),
(5, 'Cheque Payment', NULL, NULL),
(6, 'Paypal', 'fa fa-paypal', 'https://www.paypal.com'),
(7, 'Mastercard', 'fa fa-cc-mastercard', NULL),
(8, 'Visa', 'fa fa-cc-visa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `pcategory_id` int(11) NOT NULL,
  `pcategory_name` varchar(100) DEFAULT NULL,
  `pcategory_photo` text DEFAULT NULL,
  `pcategory_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`pcategory_id`, `pcategory_name`, `pcategory_photo`, `pcategory_status`) VALUES
(1, 'Clothing', 'uploads/black_clothes_tile.png', 1),
(2, 'Footwear', 'uploads/960x0.png', 1),
(3, 'Nutrition', 'uploads/GettyImages-1369898014.png', 1),
(4, 'Gym Equipment', 'uploads/s.png', 1),
(13, 'Accessories', 'uploads/gros-plan-femme-tapis-yoga_23-2148285187.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_text` text DEFAULT NULL,
  `review_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`review_id`, `product_id`, `customer_id`, `rating`, `review_text`, `review_date`) VALUES
(12, 1, 1, 5, 'GG', '2024-05-30 13:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `pcategory_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_stock_quantity` int(11) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `product_photo` text DEFAULT NULL,
  `product_photo_1` text DEFAULT NULL,
  `product_photo_2` text DEFAULT NULL,
  `product_photo_3` text DEFAULT NULL,
  `product_url` varchar(255) DEFAULT NULL,
  `product_tag` varchar(50) DEFAULT NULL,
  `product_sale_price` int(11) DEFAULT NULL,
  `product_details` text DEFAULT NULL,
  `product_features` text DEFAULT NULL,
  `sale_start_date` date DEFAULT NULL,
  `sale_end_date` date DEFAULT NULL,
  `product_keywords` text DEFAULT NULL,
  `product_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `pcategory_id`, `product_name`, `product_description`, `product_price`, `product_stock_quantity`, `brand_id`, `product_photo`, `product_photo_1`, `product_photo_2`, `product_photo_3`, `product_url`, `product_tag`, `product_sale_price`, `product_details`, `product_features`, `sale_start_date`, `sale_end_date`, `product_keywords`, `product_status`) VALUES
(1, 1, 'WORKOUT STRINGER TANK TOP', 'THIS SLIM TANK TOP IS DESIGNED WITH RESPECT FOR NATURE.\r\nPut in the time, see the results. This adidas training tank top accompanies you in your efforts at the gym with its lightweight material and AEROREADY technology which absorbs perspiration. The wide armholes and slim fit give you total freedom of movement for pull-ups and dips. This tank top is designed from natural and renewable materials to preserve our natural resources and fight against plastic pollution.Slim fit.Scoop neckline.', 90, 0, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/19cacb7c78d440cc86eccc61850cc32f_9366/Debardeur_Workout_Stringer_Rose_IX9170_21_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/1da51a5700e346a7a8d76a4eee3bd551_9366/Debardeur_Workout_Stringer_Rose_IX9170_23_hover_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/c952d44016f34b1dabc8bc3e889b8c2e_9366/Debardeur_Workout_Stringer_Rose_IX9170_25_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/2047e9ffeb0944b6a94cf6058db9285a_9366/Debardeur_Workout_Stringer_Rose_IX9170_01_laydown.jpg', '', '', 0, 'Jersey 70% lyocell, 30% recycled polyester.\r\nAEROREADY.\r\nWide armholes.\r\nLightweight material that wicks away perspiration.\r\nProduct color: Sandy Pink / Black\r\nProduct code: IX9170', 'WASHING INSTRUCTIONS\r\nDo not use bleach\r\nTumble dry low\r\nDo not dry clean\r\nGentle ironing\r\nMachine wash in warm water\r\nMAINTENANCE INFORMATION\r\nUse a gentle detergent\r\nWash and iron inside out\r\nDo not use fabric softener', '0000-00-00', '0000-00-00', '[\"f-t-shirt\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 0),
(2, 1, 'CROP TOP ADIDAS', 'THIS CASUAL CROP TOP IS MADE IN PART FROM RECYCLED MATERIALS.\r\nPut on this adidas by Stella McCartney crop top and enjoy casual comfort. Inspired by the casual chic style of 70\'s sportswear, it is designed for a life on the move. Its soft material conforms to the shape of the body. Discreet cutouts in the back reveal a little skin and promote breathability. Wear it with your favorite high-waisted pants or opt for a skort: it pairs perfectly with a bodysuit or sports bra. Whatever your style, it\'s ready to make a statement. This product is made with at least 70% recycled materials. By reusing already created materials, we help reduce waste and our dependence on limited resources, in order to reduce the ecological footprint of the products we manufacture.', 150, 13, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/a25dd26c18e44fce84892e70f1ec8b92_9366/Crop_top_adidas_by_Stella_McCartney_Noir_IN3654_21_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/8aaa87ee0ec04dbe9ebb450a0ac69e35_9366/Crop_top_adidas_by_Stella_McCartney_Noir_IN3654_23_hover_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/423bd523d63a461a9c9b29dbc1bee158_9366/Crop_top_adidas_by_Stella_McCartney_Noir_IN3654_01_laydown.jpg', '', '', '', 0, 'Tight fit.\r\nScoop neckline.\r\nKnit 73% recycled nylon, 27% elastane.\r\nShort cut.\r\nOpenworks in the back.\r\nAdidas by Stella McCartney logo.\r\nProduct color: Magic Mauve\r\nProduct code: IN3652', 'WASHING INSTRUCTIONS\r\nDo not use bleach\r\nDo not tumble dry\r\nDo not dry clean\r\nDo not iron\r\nMachine wash in cold water on gentle cycle\r\nMAINTENANCE INFORMATION\r\nDo not use fabric softener\r\nUse mild detergent only\r\nDo not wring\r\nDo not use steam\r\nWash inside out with same colors', '0000-00-00', '0000-00-00', '[\"f-t-shirt\",\"black\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(3, 1, 'CROP TOP ADIDAS', 'THIS CASUAL CROP TOP IS MADE IN PART FROM RECYCLED MATERIALS.\r\nPut on this adidas by Stella McCartney crop top and enjoy casual comfort. Inspired by the casual chic style of 70\'s sportswear, it is designed for a life on the move. Its soft material conforms to the shape of the body. Discreet cutouts in the back reveal a little skin and promote breathability. Wear it with your favorite high-waisted pants or opt for a skort: it pairs perfectly with a bodysuit or sports bra. Whatever your style, it\'s ready to make a statement. This product is made with at least 70% recycled materials. By reusing already created materials, we help reduce waste and our dependence on limited resources, in order to reduce the ecological footprint of the products we manufacture.', 150, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/296dc28e04c54ebbb1324fefbdbb4b05_9366/Crop_top_adidas_by_Stella_McCartney_Violet_IN3652_21_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/ed9d4df9c300476fb79ecfd40ee24a2d_9366/Crop_top_adidas_by_Stella_McCartney_Violet_IN3652_22_model.jpg', '', '', '', '', 0, 'Tight fit.\r\nScoop neckline.\r\nKnit 73% recycled nylon, 27% elastane.\r\nShort cut.\r\nOpenworks in the back.\r\nAdidas by Stella McCartney logo.\r\nProduct color: Magic Mauve\r\nProduct code: IN3652', 'WASHING INSTRUCTIONS\r\nDo not use bleach\r\nDo not tumble dry\r\nDo not dry clean\r\nDo not iron\r\nMachine wash in cold water on gentle cycle\r\nMAINTENANCE INFORMATION\r\nDo not use fabric softener\r\nUse mild detergent only\r\nDo not wring\r\nDo not use steam\r\nWash inside out with same colors', '0000-00-00', '0000-00-00', '[\"f-t-shirt\",\"red\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(4, 1, 'AEROREADY T-SHIRT', 'A LIGHTWEIGHT RUNNING T-SHIRT DESIGNED IN PART WITH RECYCLED MATERIALS.\r\nTake on the laps of the track with a t-shirt that is as comfortable as it is stylish. This adidas running t-shirt is made from lightweight mesh for a cool feeling no matter the distance or speed. AEROREADY technology wicks away perspiration to keep you dry, while the longer rear hem with slit sides ensures complete freedom of movement. Reflective details keep you visible when you run at dawn or after dark. This product is made with at least 70% recycled materials. By reusing already created materials, we help reduce waste and our dependence on limited resources, in order to reduce the ecological footprint of the products we manufacture.', 70, 13, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/e866fb994f6f4c998ce3e676bab65aa0_9366/T-shirt_AEROREADY_Noir_IS9584_21_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/4b3aa637a8dd4d0682023fb26062ef83_9366/T-shirt_AEROREADY_Noir_IS9584_23_hover_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/4faf0dfe73144d9589b2a4cce670239a_9366/T-shirt_AEROREADY_Noir_IS9584_25_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/52e86b6d788c4c35ba7eadb34e390e3f_9366/T-shirt_AEROREADY_Noir_IS9584_01_laydown.jpg', '', '', 0, 'Standard fit.\r\nCrew neckline.\r\nMesh 91% recycled polyester, 9% elastane.\r\nAEROREADY.\r\nLonger hem at the back with side slits.\r\nReflective details.\r\nProduct color: Black\r\nProduct code: IS9584', 'WASHING INSTRUCTIONS\r\nDo not use bleach\r\nDo not tumble dry\r\nDo not dry clean\r\nDo not iron\r\nMachine wash in warm water\r\nMAINTENANCE INFORMATION\r\nDo not use fabric softener\r\nWash inside out with same colors\r\nUse mild detergent only', '0000-00-00', '0000-00-00', '[\"f-t-shirt\",\"black\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(5, 1, 'AEROREADY T-SHIRT', 'A LIGHTWEIGHT RUNNING T-SHIRT DESIGNED IN PART WITH RECYCLED MATERIALS.\r\nTake on the laps of the track with a t-shirt that is as comfortable as it is stylish. This adidas running t-shirt is made from lightweight mesh for a cool feeling no matter the distance or speed. AEROREADY technology wicks away perspiration to keep you dry, while the longer rear hem with slit sides ensures complete freedom of movement. Reflective details keep you visible when you run at dawn or after dark. This product is made with at least 70% recycled materials. By reusing already created materials, we help reduce waste and our dependence on limited resources, in order to reduce the ecological footprint of the products we manufacture.', 70, 14, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/b10fa39bb1ef46c3b24283136374c6c3_9366/T-shirt_AEROREADY_Blanc_IV9985_21_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/26ea3eb18ad048ef9990901cb0c13b23_9366/T-shirt_AEROREADY_Blanc_IV9985_23_hover_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/1a2345d0fe3b4cca8d3f802ed80ffe52_9366/T-shirt_AEROREADY_Blanc_IV9985_25_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/ac38b0a47815406c967e97c4f6c951da_9366/T-shirt_AEROREADY_Blanc_IV9985_01_laydown.jpg', '', '', 0, 'Standard fit.\r\nCrew neckline.\r\nMesh 91% recycled polyester, 9% elastane.\r\nAEROREADY.\r\nLonger hem at the back with side slits.\r\nReflective details.\r\nProduct color: Black\r\nProduct code: IS9584', 'WASHING INSTRUCTIONS\r\nDo not use bleach\r\nDo not tumble dry\r\nDo not dry clean\r\nDo not iron\r\nMachine wash in warm water\r\nMAINTENANCE INFORMATION\r\nDo not use fabric softener\r\nWash inside out with same colors\r\nUse mild detergent only', '0000-00-00', '0000-00-00', '[\"f-t-shirt\",\"white\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(6, 1, 'Nike One', 'Up for a workout or down to chill, these biker shorts are the Ones that are ready for whatever you are. Their midweight, peachy-soft fabric stretches with your every move and dries quickly. Plus, a high waist is designed to meet your favorite cropped tops for a head-to-toe look that you can feel confident and comfortable in all day long.', 90, 15, 1, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/75e68e69-0665-43fe-9515-b9a4b6664231/one-womens-high-waisted-5-biker-shorts-p9dp3m.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/25d021b4-cb79-41be-8168-6a8f1ae8afe3/one-womens-high-waisted-5-biker-shorts-p9dp3m.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/9899388f-6bfd-43fe-9ef2-4ccb42bd2492/one-womens-high-waisted-5-biker-shorts-p9dp3m.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ae8431b5-3098-42a4-aa69-d75cde7047b5/one-womens-high-waisted-5-biker-shorts-p9dp3m.png', '', '', 0, 'Body: 80% polyester/20% spandex. Gusset lining: 100% polyester.\r\nMachine wash\r\nImported\r\nNot intended for use as Personal Protective Equipment (PPE)\r\nShown: Black/Black\r\nStyle: FN3211-010', 'Ready for it All\r\n\r\nA drop-in pocket in the back of the waistband is large enough to hold your smartphone.\r\n\r\n\r\nStay Dry\r\n\r\nNike Dri-FIT technology moves sweat away from your skin for quicker evaporation, helping you stay dry and comfortable.\r\n\r\n\r\nSomething for Every One\r\n\r\nNo One works for everything, and that\'s why we\'re offering these leggings and shorts in multiple lengths for every activity and every mood. Plus, they pair perfectly with any of our Nike One tops and bras, available in several colors to complete your look.', '0000-00-00', '0000-00-00', '[\"f-short\",\"black\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(7, 1, 'Nike One', 'Up for a workout or down to chill, these biker shorts are the Ones that are ready for whatever you are. Their midweight, peachy-soft fabric stretches with your every move and dries quickly. Plus, a high waist is designed to meet your favorite cropped tops for a head-to-toe look that you can feel confident and comfortable in all day long.', 90, 15, 1, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/ba3c9b96-8388-43a8-9b54-76e59e1f324e/one-womens-high-waisted-5-biker-shorts-p9dp3m.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b2c30883-1194-43d2-ae42-3ca3a9bcfa08/one-womens-high-waisted-5-biker-shorts-p9dp3m.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/c20ec9e3-4833-46a6-9197-8ff62f19fd43/one-womens-high-waisted-5-biker-shorts-p9dp3m.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/70ec80c9-e6c0-4d54-b85e-0b791ec146f4/one-womens-high-waisted-5-biker-shorts-p9dp3m.png', '', '', 0, 'Body: 80% polyester/20% spandex. Gusset lining: 100% polyester.\r\nMachine wash\r\nImported\r\nNot intended for use as Personal Protective Equipment (PPE)\r\nShown: Black/Black\r\nStyle: FN3211-010', 'Ready for it All\r\n\r\nA drop-in pocket in the back of the waistband is large enough to hold your smartphone.\r\n\r\n\r\nStay Dry\r\n\r\nNike Dri-FIT technology moves sweat away from your skin for quicker evaporation, helping you stay dry and comfortable.\r\n\r\n\r\nSomething for Every One\r\n\r\nNo One works for everything, and that\'s why we\'re offering these leggings and shorts in multiple lengths for every activity and every mood. Plus, they pair perfectly with any of our Nike One tops and bras, available in several colors to complete your look.', '0000-00-00', '0000-00-00', '[\"f-short\",\"yellow\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(119, 1, 'Nike Dri-FIT Breezy', 'You\'ll see our shipping options at checkout\r\n\r\nFree Pickup\r\nFind a Store\r\nMade of breathable cotton/poly jersey, this skort is equal parts style and function. The stretch waistband provides a comfy fit, pockets provide spots to stash small items and quick-drying, moisture-wicking Dri-FIT technology helps kids stay cool and dry while they play.', 90, 15, 1, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/cc5ebed3-3683-463d-a16a-6778b4ec99d3/dri-fit-breezy-little-kids-skort-9sjRCj.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b75ea2eb-6b14-404e-8c86-283e25cae457/dri-fit-breezy-little-kids-skort-9sjRCj.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/26ec2941-1ce9-426a-bca7-a4158a4209d3/dri-fit-breezy-little-kids-skort-9sjRCj.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/41ccbd14-7b15-41cc-aa7b-36fc46401685/dri-fit-breezy-little-kids-skort-9sjRCj.png', '', '', 161, 'Product Details\r\n\r\n57% Cotton, 43% Polyester\r\nMachine Wash\r\nImported\r\nShown: Black\r\nStyle: 36L794-023', 'Made of breathable cotton/poly jersey, this skort is equal parts style and function. The stretch waistband provides a comfy fit, pockets provide spots to stash small items and quick-drying, moisture-wicking Dri-FIT technology helps kids stay cool and dry while they play.', '0000-00-00', '0000-00-00', '[\"f-short\",\"black\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(120, 1, 'Nike Dri-FIT Breezy', 'You\'ll see our shipping options at checkout\r\n\r\nFree Pickup\r\nFind a Store\r\nMade of breathable cotton/poly jersey, this skort is equal parts style and function. The stretch waistband provides a comfy fit, pockets provide spots to stash small items and quick-drying, moisture-wicking Dri-FIT technology helps kids stay cool and dry while they play.', 90, 15, 1, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0d260a0f-541e-4399-aa85-4c45d7359227/dri-fit-breezy-little-kids-skort-9sjRCj.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/8519ef61-a2f8-4dfa-b2e0-62e155f47b97/dri-fit-breezy-little-kids-skort-9sjRCj.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/28bed324-b24e-455c-b36e-cbebdfba7833/dri-fit-breezy-little-kids-skort-9sjRCj.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b51391b5-ad18-4a18-9c42-3760d73e9788/dri-fit-breezy-little-kids-skort-9sjRCj.png', '', '', 161, 'Product Details\r\n\r\n57% Cotton, 43% Polyester\r\nMachine Wash\r\nImported\r\nShown: Black\r\nStyle: 36L794-023', 'Made of breathable cotton/poly jersey, this skort is equal parts style and function. The stretch waistband provides a comfy fit, pockets provide spots to stash small items and quick-drying, moisture-wicking Dri-FIT technology helps kids stay cool and dry while they play.', '0000-00-00', '0000-00-00', '[\"f-short\",\"red\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(121, 2, 'Nike Zoom Vomero 5', 'Nike Zoom Vomero 5\r\nThe Vomero 5 takes early 2000s running to modern heights. A combination of breathable and durable materials stands ready for the rigors of your day, while Zoom Air cushioning delivers a smooth ride.\r\n\r\nShown: Vast Grey/Black/Sail/Vast Grey\r\nStyle: BV1358-001', 250, 8, 1, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/kpqddwb8onq6vurqmmyy/zoom-vomero-5-mens-shoes-MgsTqZ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/sqj9b8gqy0mofneog6cx/zoom-vomero-5-mens-shoes-MgsTqZ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/rihi1y7ze3yznpppnlwn/zoom-vomero-5-mens-shoes-MgsTqZ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/t6muyiowqf7q3mvq21hk/zoom-vomero-5-mens-shoes-MgsTqZ.png', '', '', 0, 'Not intended for use as Personal Protective Equipment (PPE)\r\nShown: Vast Grey/Black/Sail/Vast Grey\r\nStyle: BV1358-001', 'The Vomero 5 takes early 2000s running to modern heights. A combination of breathable and durable materials stands ready for the rigors of your day, while Zoom Air cushioning delivers a smooth ride.\r\n\r\n\r\nBenefits\r\n\r\nMesh with TecTuff® and utilitarian overlays is breathable and durable.\r\nCushlon foam with Zoom Air cushioning offers a responsive, smooth ride.\r\nRubber tread gives you durable traction.', '0000-00-00', '0000-00-00', '[\"white\",\"f-training shoes\",\"s-45\",\"s-43\"]', 1),
(122, 2, 'Nike Zoom Vomero 5', 'Nike Zoom Vomero 5\r\nThe Vomero 5 takes early 2000s running to modern heights. A combination of breathable and durable materials stands ready for the rigors of your day, while Zoom Air cushioning delivers a smooth ride.\r\n\r\nShown: Vast Grey/Black/Sail/Vast Grey\r\nStyle: BV1358-001', 290, 15, 1, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/bef66a48-a878-46c7-abac-5afc310d63a5/zoom-vomero-5-mens-shoes-MgsTqZ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/630aa87d-7fee-4c5d-9d7e-b2f798269bde/zoom-vomero-5-mens-shoes-MgsTqZ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/284702d8-7c98-4dd3-820d-9d6bb9ee0df7/zoom-vomero-5-mens-shoes-MgsTqZ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/d14a235d-2c52-4a72-a4d5-ddeb4dd8d05a/zoom-vomero-5-mens-shoes-MgsTqZ.png', '', '', 0, 'Not intended for use as Personal Protective Equipment (PPE)\r\nShown: Vast Grey/Black/Sail/Vast Grey\r\nStyle: BV1358-001', 'The Vomero 5 takes early 2000s running to modern heights. A combination of breathable and durable materials stands ready for the rigors of your day, while Zoom Air cushioning delivers a smooth ride.\r\n\r\n\r\nBenefits\r\n\r\nMesh with TecTuff® and utilitarian overlays is breathable and durable.\r\nCushlon foam with Zoom Air cushioning offers a responsive, smooth ride.\r\nRubber tread gives you durable traction.', '0000-00-00', '0000-00-00', '[\"blue\",\"f-training shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\"]', 1),
(123, 2, 'Nike Zoom Vomero 5', 'Nike Zoom Vomero 5\r\nThe Vomero 5 takes early 2000s running to modern heights. A combination of breathable and durable materials stands ready for the rigors of your day, while Zoom Air cushioning delivers a smooth ride.\r\n\r\nShown: Vast Grey/Black/Sail/Vast Grey\r\nStyle: BV1358-001', 250, 15, 1, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/305a75c4-b498-4d8c-a52d-0781dac1c0af/zoom-vomero-5-mens-shoes-MgsTqZ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/2c090c54-d6d8-4787-94f7-94c8af565c7e/zoom-vomero-5-mens-shoes-MgsTqZ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/948c82b5-e1fe-45ec-87e3-30b1a4ed6af6/zoom-vomero-5-mens-shoes-MgsTqZ.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/eb8bef6f-1410-4c45-b5d5-428b8467b85f/zoom-vomero-5-mens-shoes-MgsTqZ.png', '', '', 0, 'Not intended for use as Personal Protective Equipment (PPE)\r\nShown: Vast Grey/Black/Sail/Vast Grey\r\nStyle: BV1358-001', 'The Vomero 5 takes early 2000s running to modern heights. A combination of breathable and durable materials stands ready for the rigors of your day, while Zoom Air cushioning delivers a smooth ride.\r\n\r\n\r\nBenefits\r\n\r\nMesh with TecTuff® and utilitarian overlays is breathable and durable.\r\nCushlon foam with Zoom Air cushioning offers a responsive, smooth ride.\r\nRubber tread gives you durable traction.', '0000-00-00', '0000-00-00', '[\"black\",\"f-training shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\"]', 1),
(124, 2, 'Nike P-6000', 'Shipping\r\n\r\nYou\'ll see our shipping options at checkout\r\n\r\nFree Pickup\r\nFind a Store\r\nThe Nike P-6000 draws on the 2006 Nike Air Pegasus, bringing you a mash-up of iconic style that\'s breathable, comfortable and evocative of that early-2000s vibe.\r\n\r\nShown: Aquarius Blue/Metallic Silver/White/Black\r\nStyle: CD6404-401', 280, 14, 1, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/61f2aadd-c38d-4013-b637-3b59a1f46cbc/p-6000-shoes-XkgpKW.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/6b5e4d6a-f4cc-476c-9268-74c574e0457d/p-6000-shoes-XkgpKW.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/8ee77592-c477-42cb-b926-86bb3c4a6847/p-6000-shoes-XkgpKW.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/60fc9a9c-efec-4a21-a405-dd3ca2e22a4f/p-6000-shoes-XkgpKW.png', '', '', 0, 'Tongue webbing with \"Bowerman Series\" branding\r\nNike logo on tongue tab\r\nMolded synthetic leather Swoosh design\r\nShown: Aquarius Blue/Metallic Silver/White/Black\r\nStyle: CD6404-401', 'The Nike P-6000 draws on the 2006 Nike Air Pegasus, bringing you a mash-up of iconic style that\'s breathable, comfortable and evocative of that early-2000s vibe.\r\n\r\n\r\nSubstance Meets Style\r\n\r\nBreathable mesh has real and synthetic leather overlays to give a 2000s running aesthetic.\r\n\r\n\r\nMade for Comfort\r\n\r\nFoam midsole provides lightweight cushioning for a plush underfoot feel.\r\n\r\n\r\nNo-Slip Grip\r\n\r\nA full rubber outsole gives you durable traction.', '0000-00-00', '0000-00-00', '[\"blue\",\"f-running shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\"]', 1),
(125, 2, 'Nike P-6000', 'Shipping\r\n\r\nYou\'ll see our shipping options at checkout\r\n\r\nFree Pickup\r\nFind a Store\r\nThe Nike P-6000 draws on the 2006 Nike Air Pegasus, bringing you a mash-up of iconic style that\'s breathable, comfortable and evocative of that early-2000s vibe.\r\n\r\nShown: Aquarius Blue/Metallic Silver/White/Black\r\nStyle: CD6404-401', 280, 15, 1, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/309e8088-9eb0-4fe6-9f79-cd1fdfb0b201/p-6000-shoes-XkgpKW.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/079e05be-b01e-41e4-b2a7-be3e7e926e0b/p-6000-shoes-XkgpKW.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/dc440421-531e-4143-a230-4b75576320f4/p-6000-shoes-XkgpKW.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/295dafc4-14df-4382-903b-7c6a07f90ec3/p-6000-shoes-XkgpKW.png', '', '', 0, 'Tongue webbing with \"Bowerman Series\" branding\r\nNike logo on tongue tab\r\nMolded synthetic leather Swoosh design\r\nShown: Aquarius Blue/Metallic Silver/White/Black\r\nStyle: CD6404-401', 'The Nike P-6000 draws on the 2006 Nike Air Pegasus, bringing you a mash-up of iconic style that\'s breathable, comfortable and evocative of that early-2000s vibe.\r\n\r\n\r\nSubstance Meets Style\r\n\r\nBreathable mesh has real and synthetic leather overlays to give a 2000s running aesthetic.\r\n\r\n\r\nMade for Comfort\r\n\r\nFoam midsole provides lightweight cushioning for a plush underfoot feel.\r\n\r\n\r\nNo-Slip Grip\r\n\r\nA full rubber outsole gives you durable traction.', '0000-00-00', '0000-00-00', '[\"yellow\",\"f-running shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\"]', 1),
(127, 2, 'FuelCell SuperComp Trainer v2', 'The FuelCell SuperComp Trainer v2 delivers performance in seconds with race day energy return technology in this high mileage training shoe. In this version of the new Energy Arc technology, a midsole houses an arched carbon fiber plate, hidden between two layers of FuelCell cushioning, forming a hollow passageway in the middle of the shoe. The plate is pressed into space with each stride and returns energy as it reforms, providing a high-rebound, propulsive feeling. The FuelCell SuperComp Trainer v2 is designed to look, feel and perform differently.', 699, 13, 6, 'https://nb.scene7.com/is/image/NB/mrcxbk3_nb_02_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/mrcxbk3_nb_03_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/mrcxbk3_nb_05_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/mrcxbk3_nb_07_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', '', 'Sale', 499, 'Logo N\r\n  282.2 grams (10 oz)\r\nComposition\r\nBreathable flat-knit upper with locked-in feel\r\nStyle no: MRCXBK3', 'With Energy Arc Technology: Energy Arc technology combines a sport-friendly carbon fiber plate with strategic midsole dimples designed to increase stored energy and deploy more total energy\r\nFuelCell foam helps propel you forward\r\nBreathable flat-knit upper with a snug, supportive feel', '2024-05-24', '2024-06-10', '[\"black\",\"f-running shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\"]', 1),
(128, 2, 'FuelCell SuperComp Trainer v2', 'The FuelCell SuperComp Trainer v2 delivers performance in seconds with race day energy return technology in this high mileage training shoe. In this version of the new Energy Arc technology, a midsole houses an arched carbon fiber plate, hidden between two layers of FuelCell cushioning, forming a hollow passageway in the middle of the shoe. The plate is pressed into space with each stride and returns energy as it reforms, providing a high-rebound, propulsive feeling. The FuelCell SuperComp Trainer v2 is designed to look, feel and perform differently.', 699, 13, 6, 'https://nb.scene7.com/is/image/NB/mrcxca3_nb_02_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/mrcxca3_nb_03_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/mrcxca3_nb_05_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/mrcxca3_nb_04_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', '', 'Sale', 499, 'Logo N\r\n  282.2 grams (10 oz)\r\nComposition\r\nBreathable flat-knit upper with locked-in feel\r\nStyle no: MRCXBK3', 'With Energy Arc Technology: Energy Arc technology combines a sport-friendly carbon fiber plate with strategic midsole dimples designed to increase stored energy and deploy more total energy\r\nFuelCell foam helps propel you forward\r\nBreathable flat-knit upper with a snug, supportive feel', '2024-05-24', '2024-06-10', '[\"green\",\"f-running shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\"]', 1),
(129, 1, 'Women\'s UA Unstoppable Jacket', 'What\'s it do?\r\nIf you\'re looking for a jacket you can actually train in on cold, wet days—you found it. Super-light and stretchy, rain rolls right off, and it keeps you warm but not hot.', 199, 15, 3, 'https://underarmour.scene7.com/is/image/Underarmour/V5-1374889-200_FC?rp=standard-0pad%7CpdpMainDesktop&scl=1&fmt=jpg&qlt=85&resMode=sharp2&cache=on%2Con&bgc=F0F0F0&wid=566&hei=708&size=566%2C708', 'https://underarmour.scene7.com/is/image/Underarmour/V5-1374889-200_BC?rp=standard-0pad%7CpdpMainDesktop&scl=1&fmt=jpg&qlt=85&resMode=sharp2&cache=on%2Con&bgc=F0F0F0&wid=566&hei=708&size=566%2C708', 'https://underarmour.scene7.com/is/image/Underarmour/V5-1374889-200_FSF?rp=standard-0pad%7CpdpMainDesktop&scl=1&fmt=jpg&qlt=85&resMode=sharp2&cache=on%2Con&bgc=F0F0F0&wid=566&hei=708&size=566%2C708', 'https://underarmour.scene7.com/is/image/Underarmour/V5-1374889-200_COLLAR?rp=standard-0pad%7CpdpMainDesktop&scl=1&fmt=jpg&qlt=85&resMode=sharp2&cache=on%2Con&bgc=F0F0F0&wid=566&hei=708&size=566%2C708', '', '', 0, 'Stretch-woven fabric is tough but lightweight\r\n4-way stretch material moves better in every direction\r\nSecure, zip hand pockets\r\nBungee drawcord adjust on bottom hem for a secure, custom fit', 'Loose: Fuller cut for complete comfort.\r\nStyle #: 1374889\r\n90% Polyester/10% Elastane\r\nImported', '0000-00-00', '0000-00-00', '[\"white\",\"f-jacket\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(131, 1, 'Women\'s UA Unstoppable Jacket', 'What\'s it do?\r\nIf you\'re looking for a jacket you can actually train in on cold, wet days—you found it. Super-light and stretchy, rain rolls right off, and it keeps you warm but not hot.', 199, 15, 3, 'https://underarmour.scene7.com/is/image/Underarmour/V5-1374889-001_FC?rp=standard-0pad%7CpdpMainDesktop&scl=1&fmt=jpg&qlt=85&resMode=sharp2&cache=on%2Con&bgc=F0F0F0&wid=566&hei=708&size=566%2C708', 'https://underarmour.scene7.com/is/image/Underarmour/V5-1374889-001_BC?rp=standard-0pad%7CpdpMainDesktop&scl=1&fmt=jpg&qlt=85&resMode=sharp2&cache=on%2Con&bgc=F0F0F0&wid=566&hei=708&size=566%2C708', 'https://underarmour.scene7.com/is/image/Underarmour/V5-1374889-001_FSF?rp=standard-0pad%7CpdpMainDesktop&scl=1&fmt=jpg&qlt=85&resMode=sharp2&cache=on%2Con&bgc=F0F0F0&wid=566&hei=708&size=566%2C708', 'https://underarmour.scene7.com/is/image/Underarmour/V5-1374889-001_SIDEDET?rp=standard-0pad%7CpdpMainDesktop&scl=1&fmt=jpg&qlt=85&resMode=sharp2&cache=on%2Con&bgc=F0F0F0&wid=566&hei=708&size=566%2C708', '', '', 0, 'Stretch-woven fabric is tough but lightweight\r\n4-way stretch material moves better in every direction\r\nSecure, zip hand pockets\r\nBungee drawcord adjust on bottom hem for a secure, custom fit', 'Loose: Fuller cut for complete comfort.\r\nStyle #: 1374889\r\n90% Polyester/10% Elastane\r\nImported', '0000-00-00', '0000-00-00', '[\"black\",\"f-jacket\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(132, 1, 'Men\'s Project Rock Woven Red, White & Blue Jacket', 'Project Rock training gear was built to help you find boundaries, then push right through them. Everything in this collection was personally approved by Dwayne Johnson, the hardest worker in the room. ANY room.', 199, 3, 3, 'https://underarmour.scene7.com/is/image/Underarmour/V5-1384162-100_FC?rp=standard-0pad%7CpdpMainDesktop&scl=1&fmt=jpg&qlt=85&resMode=sharp2&cache=on%2Con&bgc=F0F0F0&wid=566&hei=708&size=566%2C708', 'https://underarmour.scene7.com/is/image/Underarmour/V5-1384162-100_BC?rp=standard-0pad%7CpdpMainDesktop&scl=1&fmt=jpg&qlt=85&resMode=sharp2&cache=on%2Con&bgc=F0F0F0&wid=566&hei=708&size=566%2C708', 'https://underarmour.scene7.com/is/image/Underarmour/V5-1384162-100_HOOD?rp=standard-0pad%7CpdpMainDesktop&scl=1&fmt=jpg&qlt=85&resMode=sharp2&cache=on%2Con&bgc=F0F0F0&wid=566&hei=708&size=566%2C708', '', '', '', 0, 'Loose: Fuller cut for complete comfort.\r\nStyle #: 1384162\r\n100% Polyester\r\nImported', 'UA Storm technology repels water without sacrificing breathability\r\nSmooth woven fabric is lightweight & extremely durable\r\nSecure, zip hand pockets\r\nEncased elastic cuffs & bottom hem for a secure fit\r\nPiped trim details', '0000-00-00', '0000-00-00', '[\"f-jacket\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(133, 1, 'ADAPT FLECK SEAMLESS LEGGINGS', 'The collection made for lifting, flex on your latest ‘fit in Adapt Fleck.\r\n\r\n• Sweat-wicking finishing keeps you cool through every rep\r\n• Supportive, stay-put ribbed waistband\r\n• All over fleck jacquard pattern', 80, 14, 6, 'https://cdn.shopify.com/s/files/1/1367/5207/files/ADAPTFLECKSEAMLESSLEGGINGSENG-L-A0015GSDuskGreenGSLightSageGreenB2A1B-ECCN4_1920x.jpg?v=1689161714', 'https://cdn.shopify.com/s/files/1/1367/5207/files/ADAPTFLECKSEAMLESSLEGGINGSENG-L-A0015GSDuskGreenGSLightSageGreenB2A1B-ECCN14_1920x.jpg?v=1689161715', 'https://cdn.shopify.com/s/files/1/1367/5207/files/ADAPTFLECKSEAMLESSLEGGINGSENG-L-A0015GSDuskGreenGSLightSageGreenB2A1B-ECCN10_1920x.jpg?v=1689161714', '', '', '', 0, 'SIZE & FIT\r\n• High waisted\r\n• Model is 5\'9\" and wears a size XS\r\n\r\nMATERIALS & CARE\r\n• 79% Nylon, 15% Polyester, 6% Elastane\r\n• Seamless construction', '', '0000-00-00', '0000-00-00', '[\"green\",\"f-legging\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(134, 1, 'ADAPT FLECK SEAMLESS LEGGINGS', 'The collection made for lifting, flex on your latest ‘fit in Adapt Fleck.\r\n\r\n• Sweat-wicking finishing keeps you cool through every rep\r\n• Supportive, stay-put ribbed waistband\r\n• All over fleck jacquard pattern', 80, 4, 6, 'https://cdn.shopify.com/s/files/1/1367/5207/files/AdaptFleckSeamlessLeggingsEng-L-A0015BlackB2A1BB2A1B-BBDG.A-Edit_BK_1920x.jpg?v=1704363677', 'https://cdn.shopify.com/s/files/1/1367/5207/files/AdaptFleckSeamlessLeggingsEng-L-A0015BlackB2A1BB2A1B-BBDG.B-Edit_BK_1920x.jpg?v=1704363678', 'https://cdn.shopify.com/s/files/1/1367/5207/files/AdaptFleckSeamlessLeggingsEng-L-A0015BlackB2A1BB2A1B-BBDG.C-Edit_BK_1920x.jpg?v=1704363678', '', '', '', 0, 'SIZE & FIT\r\n• High waisted\r\n• Model is 5\'9\" and wears a size XS\r\n\r\nMATERIALS & CARE\r\n• 79% Nylon, 15% Polyester, 6% Elastane\r\n• Seamless construction', '', '0000-00-00', '0000-00-00', '[\"black\",\"f-legging\",\"s-s\",\"s-m\",\"s-l\",\"s-xl\",\"s-2xl\",\"s-3xl\"]', 1),
(135, 1, 'SWEAT SEAMLESS CROSS BACK SPORTS BRA', 'IT GIRL OF THE HIIT WORLD\r\n\r\nStrong, unapologetic, and a total baddie. We know you need a fit that matches your energy, and Sweat will make sure you look & feel confident before, during and after your workout (or hot girl walk).\r\n\r\n• Premium DYNMC™️ fabric is soft, breathable and durable\r\n• Adjustable straps to customise your fit\r\n• Stylish ruche to front with crossed back straps\r\n• Breathable eyelet detailing\r\n• Comfy shaped ribbed underband (not seamless)\r\n• Internal cup opening with removable cups', 59, 11, 6, 'https://cdn.shopify.com/s/files/1/1367/5207/files/SweatSeamlessCrossBackSportsBraGSBlackB6A6M-BB2J718_1920x.jpg?v=1709107969', 'https://cdn.shopify.com/s/files/1/1367/5207/files/SweatSeamlessCrossBackSportsBraGSBlackB6A6M-BB2J735_21f1df8d-c89c-49cf-9bcb-b6766f17a785_1920x.jpg?v=1709107969', 'https://cdn.shopify.com/s/files/1/1367/5207/files/SweatSeamlessCrossBackSportsBraGSBlackB6A6M-BB2J725_1920x.jpg?v=1709107969', '', '', '', 0, 'SIZE & FIT\r\n• Medium support\r\n• Model is 5\'7\" and wears a size S\r\n\r\nMATERIALS & CARE\r\n• 84% Nylon, 9% Polyester, 7% Elastane\r\n• Machine wash cold with the same or similar colours\r\n• Don’t dry clean, iron or bleach\r\n• Seamless construction\r\n• Premium DYNMC™️ fabric', '', '0000-00-00', '0000-00-00', '[\"f-bra\"]', 1),
(136, 1, 'ELEVATE LONGLINE SPORTS BRA', 'ELEVATE YOUR EVERYDAY\r\n\r\nWhether it’s feeling the heat in hot yoga, ticking off errands on your Sunday reset or heading for brunch with the girls, Elevate’s right there with you, every step of the way.\r\n\r\n• Buttery soft RLSE™️ fabric balances support and stretch for full freedom of movement\r\n• Sweat-wicking & breathable to keep you cool & dry\r\n• Ruched detail to chest for a stylish look\r\n• Flatlock seams for reduced irritation and zero distractions\r\n• Removable, shaped cups for a customisable fit\r\n• Flush fit, second-skin feel underband for ultimate comfort', 69, 14, 6, 'https://cdn.shopify.com/s/files/1/1367/5207/files/ElevateLonglineSportsBraGSPlumBrownB3A7B-NBZN4389_1920x.jpg?v=1709108000', 'https://cdn.shopify.com/s/files/1/1367/5207/files/ElevateLonglineSportsBraGSPlumBrownB3A7B-NBZN4391_1920x.jpg?v=1709107999', 'https://cdn.shopify.com/s/files/1/1367/5207/files/ElevateLonglineSportsBraGSPlumBrownB3A7B-NBZN4390_1920x.jpg?v=1709107999', '', '', '', 0, 'SIZE & FIT\r\n• Light support\r\n• Longline design\r\n• Model is 5\'9\" and wears size S\r\n\r\nMATERIALS & CARE\r\n• Premium RLSE™️ fabric\r\n• 75% Recycled Nylon, 25% Elastane\r\n• Seamless construction', '', '0000-00-00', '0000-00-00', '[\"f-bra\"]', 1),
(137, 13, 'TRAINING GLOVES', 'These adidas training gloves protect your hands so you can only concentrate on lifting the weights. Made from robust material, they withstand an intense session, from warm-up to the last set. Velcro straps on the wrist ensure a perfect fit, while the non-slip palm ensures a secure grip when gripping dumbbells, barbells and machine handles. The material specially designed for wiping your nose on your thumbs is a very practical detail, while the mesh inserts on the back of the hand let your skin breathe.', 79, 15, 6, 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/5d459cb8fb0543f19a32afd000b0e12b_9366/II5598_01_standard.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/7ed951a46a01484295a9afd000b0e6ef_9366/II5598_41_detail_hover.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/aeff23aa9f764a75ab0fafd000b0ecf4_9366/II5598_42_detail.jpg', '', '', '', 0, 'Synthetic material 55% recycled polyester, 45% polyurethane.\r\nMesh inserts on the back of the hand.\r\nAnti-slip palm.\r\nScratch on the wrist.\r\nMaterial on the thumb to wipe your nose.', '', '0000-00-00', '0000-00-00', '[\"f-gloves\"]', 1),
(138, 13, 'AEROREADY TRAINING RUNNING BASEBALL CAP', 'This adidas baseball cap gives you optimal protection, whether you\'re training for your next race or just going for a quick run. Sweat-wicking AEROREADY technology and a breathable mesh lining keep you comfortably dry. The adjustable back closure ensures a perfect fit, while the embossed silicone logo adds a sporty touch. This product is made with 50% Parley Ocean Plastic, a material created from recycled plastic waste that has been collected from islands, beaches and coastlines, to prevent ocean pollution. This product contains at least 70% recycled content in total.', 69, 15, 2, 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/aee32706da88475a9a2faf1000ebb9e6_9366/HT2031_01_standard.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/0a4d3c29f06746f3a9aeaf1700df0003_9366/HT2031_41_detail_hover.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/0a4d3c29f06746f3a9aeaf1700df0003_9366/HT2031_41_detail_hover.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/62bfa4236e5a46628a4eaf1700df0b28_9366/HT2031_42_detail.jpg', '', '', 0, 'Main part: 100% recycled polyester twill.\r\nSweatband: 100% recycled polyester double mesh.\r\nLining: 100% recycled polyester mesh.\r\nAEROREADY.\r\nAdjustable closure at the back.\r\nPrinted logo.\r\nYarn containing 50% Parley Ocean Plastic.\r\nThis product contains at least 70% recycled materials in total.', '', '0000-00-00', '0000-00-00', '[\"f-cap\"]', 1),
(139, 13, 'TIRO LEAGUE CAP', 'Show your passion for football. This adidas Tiro League cap stands out with an embroidered Performance logo above its pre-formed visor. Its adjustable closure at the back ensures a perfect fit. A padded sweatband on the inside reduces distractions. Designed from recycled materials, and containing at least 60% recycled materials, this product is just one of our solutions to combat plastic waste.', 79, 14, 2, 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/b485b13144354193ae94aefa00ce85f0_9366/HS9753_01_standard.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/4c803e777a784ac9b46faefa00ce8f2c_9366/HS9753_02_standard_hover.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/bf81e00e226f460695bfaefa00ce9aad_9366/HS9753_41_detail.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/4ae464d3dcbd4b99bc69aefa00cea2cc_9366/HS9753_42_detail.jpg', '', '', 0, '100% cotton twill.\r\nQuilted sweatband: 100% recycled polyester double mesh.\r\nPreformed visor.\r\nAdjustable rear tab.', '', '0000-00-00', '0000-00-00', '[\"f-cap\"]', 1),
(140, 13, 'PERFORMANCE BOTTLE 0.5 L', 'Staying hydrated shouldn\'t be complicated. Grab your adidas Performance water bottle, fill it up, drink, and start again. Ultra-resistant, it is designed to withstand daily wear and tear. Its wide opening makes it easy to add ice cubes. Machine wash it after each use, and away you go.', 49, 15, 2, 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/d569548037504f80a84caa990151b580_9366/FM9936_01_standard.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/a0e879ee85c84fe4a230aa990151c655_9366/FM9936_41_detail_hover.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/cebd783997854d95bda7aa990151d8e3_9366/FM9936_42_detail.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/b65f63c7c2874025a7c2aa990151ebbd_9366/FM9936_43_detail.jpg', '', '', 0, 'Volume: 0.5L.\r\n100% injection molded TPU.\r\nBPA-free bottle.\r\nTPU spout.\r\nWide opening unscrewable cap.\r\nMachine washable.', '', '0000-00-00', '0000-00-00', '[\"f-bottle\"]', 1),
(141, 13, 'POWER VI BACKPACK', 'Carrying your sports gear can be an effort in itself. Carry everything you need with this adidas backpack. It is equipped with compression straps to distribute the load and several zipped compartments to organize your equipment. It even has a computer compartment in case you go to work after your session. Designed from recycled materials, and containing at least 60% recycled materials, this product is just one of our solutions to combat plastic waste.', 129, 15, 2, 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/441f7bf366214bc487f2ad9e01210c69_9366/HB1324_01_standard.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/986c7fe02fbd4677aa15ad9e01211ed1_9366/HB1324_02_standard.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/5240b08f585146de8bcfad9e01213126_9366/HB1324_04_standard.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/1925271750fb4a479f53ad9e012145bf_9366/HB1324_05_hover_standard.jpg', '', '', 0, 'Dimensions: 19cm x 30cm x 48cm.\r\nVolume: 23.5 liters.\r\nOuter layer: 100% recycled polyester spacer fabric.\r\nLining: 100% recycled polyester canvas.\r\nMultiple zipped compartments.\r\nMesh side pockets.\r\nInterior laptop compartment.\r\nCompression straps.\r\nDurable coated base.\r\nplain weave', '', '0000-00-00', '0000-00-00', '[\"f-backpack\"]', 1),
(142, 13, 'Nike Dri-FIT Apex', 'Channel early-aughts vibes in the Nike Apex, our mid-depth bucket hat that dials up the cool factor of any outfit. Durable, sweat-wicking ripstop fabric and a sweatband keep you feeling as good as you look.', 49, 15, 1, 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/0f87adde-6366-49e3-9ab8-3ee6a7ecd64d/dri-fit-apex-camo-print-bucket-hat-Cvk6bB.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/d7eceef8-1ae5-472c-9d3d-7a76bdc75d54/dri-fit-apex-camo-print-bucket-hat-Cvk6bB.png', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/5240b08f585146de8bcfad9e01213126_9366/HB1324_04_standard.jpg', 'https://assets.adidas.com/images/w_1880,f_auto,q_auto/1925271750fb4a479f53ad9e012145bf_9366/HB1324_05_hover_standard.jpg', '', '', 0, '', '', '0000-00-00', '0000-00-00', '[\"f-cap\"]', 1),
(143, 13, 'NEOPRENE BELT', 'Custom-made neoprene belt in 7mm high quality neoprene material, designed by and for strongman/strongwoman!\r\n\r\nThe neoprene belt is perfect to use as an under belt for your regular leather lifting belt, to get better comfort. The neoprene belt works at least as well when used alone. Perfect for exercises where you need more mobility.', 29, 15, 16, 'https://ntgear.eu/cdn/shop/files/Neoprene_Belt_Front_5000x.jpg?v=1713473008', 'https://ntgear.eu/cdn/shop/files/Neoprene_Belt_Back_5000x.jpg?v=1713473005', 'https://ntgear.eu/cdn/shop/files/Neoprene_Belt_Close_2000x.jpg?v=1713473006', '', '', '', 0, 'Specifications:\r\n7mm thick high quality neoprene material.\r\nPlastic rails for extra support.\r\nCreates warmth, support and stability.\r\nExtra large and reinforced Velcro straps.\r\n6 month warranty.', 'We have chosen to insert plastic rails on the back of the belt to give you extra support where it is needed, in the back. Extra large and reinforced Velcro straps to make the belt easy to put on and stay in place.\r\n\r\nThe belt is made to create warmth, support and stability for the entire torso, to reduce the risk of injury and increase performance.', '0000-00-00', '0000-00-00', '[\"f-belt\"]', 1),
(144, 4, 'CAP RUBBER COATED KETTLEBELL WITH CHROME HANDLE, BLACK', 'The CAP Rubber Coated Kettlebell with Chrome Handle in black allows you to workout in a style and on a wider array of surfaces without damage to your floors or equipment. Kettlebells help to sculpt and tone the entire body because lifting and controlling a kettlebell forces the body, specifically the core, to contract all at one time. Get a whole body workout with the black CAP Rubber Coated Kettlebell.', 59, 15, 14, 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/products/874/5049/SDKRB-010C__98193.1541799631.jpg?c=2', 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/products/874/5050/SDKRB-020C__40561.1541799632.jpg?c=2', 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/products/874/5039/SDKRB-020C_SPEC__07782.1541799632.jpg?c=2', '', '', '', 0, 'Quality, solid cast-iron construction with beautiful rubber coating\r\nChrome, wide handle grip\r\nRubber coating helps prevent floor damage', '', '0000-00-00', '0000-00-00', '[\"f-kettlebell\"]', 1),
(145, 4, 'CAP HAMMERTONE CAST IRON KETTLEBELL, GRAY', 'You can improve your strength and endurance with ease using the CAP Barbell Cast Iron Kettlebell. It is designed to strengthen and tone your muscles by lifting and controlling its motion through a variety of prescribed exercises movements. Made from solid cast iron with a tough enamel finish, it is an extremely versatile piece of workout gear that will withstand everyday use. It features a soft, comfortable grip that allows you to switch it from one hand to the other while maintaining your balance and stability. When used with a controlled motion.', 49, 15, 14, 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/attribute_rule_images/14389_source_1471279551.jpg', 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/products/577/5016/SDK2G-010AZ__60832.1541798797.jpg?c=2', 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/products/577/5017/SDK2G-010AZ_SPEC__18308.1541798812.jpg?c=2', '', '', '', 0, 'Engages multiple muscle groups at once\r\nCast-iron construction\r\nDevelops strength, power and more', 'this CAP Barbell kettlebell will help you get a whole body workout while focusing on specific muscle groups. You can perform bicep curls, triceps extensions and other exercises quickly and efficiently. Give your body a full workout in just a matter a minutes with this kettlebell.', '0000-00-00', '0000-00-00', '[\"f-kettlebell\"]', 1),
(146, 4, 'CAP CAST IRON HEX DUMBBELL, BLACK', 'CAP\'s Black Cast Iron Hex Dumbbells can be used for both the upper body and lower body to strengthen all muscle groups. The hexagon shape of these dumbbells is designed to prevent them from rolling and provide easier storage. Each dumbbell is made of solid cast iron and stylishly coated with black enamel with silver weight markers.', 29, 15, 14, 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/attribute_rule_images/13884_source_1463601702.jpg', 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/attribute_rule_images/13884_source_1463601702.jpg', 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/products/574/2939/SDB2_Set_002__73959.1611686391.jpg?c=2', '', '', '', 0, 'Hex shape prevents rolling and provides easier storage\r\nUsed to strengthen all muscle groups\r\nCoated with black enamel', 'this CAP Barbell kettlebell will help you get a whole body workout while focusing on specific muscle groups. You can perform bicep curls, triceps extensions and other exercises quickly and efficiently. Give your body a full workout in just a matter a minutes with this kettlebell.', '0000-00-00', '0000-00-00', '[\"f-dumbbell\"]', 1);
INSERT INTO `products` (`product_id`, `pcategory_id`, `product_name`, `product_description`, `product_price`, `product_stock_quantity`, `brand_id`, `product_photo`, `product_photo_1`, `product_photo_2`, `product_photo_3`, `product_url`, `product_tag`, `product_sale_price`, `product_details`, `product_features`, `sale_start_date`, `sale_end_date`, `product_keywords`, `product_status`) VALUES
(147, 4, 'CAP STANDARD WEIGHT SET WITH 3-PIECE THREADED BAR, 100 LB', 'The CAP 100 lb Standard Weight Set with 3-Threaded Bar includes a three-piece bar, 6x 10 lb plates, 6x 5 lb plates and 2x star collars. Plates are made of solid cast iron. Bars are made of steel. This set is ideal for home use and is a great starter set for strengthening and sculpting of all muscle groups.', 129, 15, 14, 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/products/334/1594/RSG-100T3__35313.1459893324.jpg?c=2', 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/products/334/1595/RSG-100T3001__86877.1459893324.jpg?c=2', 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/500x659/products/334/1596/RSG-100T3003__55004.1459893324.jpg?c=2', '', '', '', 0, '57 in 3-piece threaded bar with star collars\r\nIncludes: 6x 10 lb standard plates, 6x 5 lb standard plates, 1x 5 ft threaded bar in 3 parts, and 2 threaded star collars\r\nBeautiful chrome colored bar with cast iron weight plates', 'this CAP Barbell kettlebell will help you get a whole body workout while focusing on specific muscle groups. You can perform bicep curls, triceps extensions and other exercises quickly and efficiently. Give your body a full workout in just a matter a minutes with this kettlebell.', '0000-00-00', '0000-00-00', '[\"f-bar\"]', 1),
(148, 4, 'CAP VINYL WEIGHT SET, 100 LB', 'Keep yourself fit and toned with the CAP Vinyl Weight Set, designed to give you a full body workout. It is excellent for working out your arms, chest, back and legs. This CAP Vinyl Weight Set is the ideal solution for a beginner, as well as the most experienced lifter. Cement-filled weights have been a standard in the lifting community for years. The set comes with 100 lb of weight plates, including two 25-pound, two 15-pound and two 10-pound weights along with a tubular steel bar that allows you to create your own weight configuration for lifting and various exercises.', 89, 15, 14, 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/products/335/2219/RSV-105Assembled__27025.1460660749.jpg?c=2', 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/products/335/2218/RSV-105Set__99447.1460660749.jpg?c=2', 'https://cdn11.bigcommerce.com/s-nmzi6/images/stencil/1280x1280/products/335/2220/RSV-105Model__05194.1460660749.jpg?c=2', '', '', '', 0, 'Weight set includes: two 25 lb, two 15 lb and two 10 lb, 2 collars and a 1\' 2 piece bar', 'The vinyl weight set is the perfect solution for a beginner, as well as the experienced lifter\r\nThe CAP Weight set comes with 100 lb of weight plates, a tubular steel bar and collars; everything you need right out of the box\r\nCement filled weights in this 100 pound weight set have been a standard in the lifting community for years\r\nPerfect for arms, chest, back and legs, this Gold\'s Gym Weight Set can do it all\r\n', '0000-00-00', '0000-00-00', '[\"f-bar\"]', 1),
(149, 3, 'Hydro Isolate - CHOOCARMEL', 'Whey Isolate is a 2nd generation whey protein concentrate. When the classic concentrate is limited to a protein level of 80%, the whey isolate is capable of reaching 90%. Isolate is an even more concentrated concentrate that has undergone an additional, even finer filtration step. This blanching process eliminates as many carbohydrates and lipids as possible, leaving only the lactalbumins and other serum and globular proteins in the whey. Concentrated and Isolated are the same protein but their concentrations differ. Hydrolyzate is added to this list: It differs from concentrate and isolate by its modified nature. In fact, the hydrolyzate is whey partially degraded via an enzymatic hydrolysis process.', 80, 14, 14, 'https://www.impactnutrition.com.tn/wp-content/uploads/2022/01/ISOLATE-CHOCOCARMEL-700g.jpg', '', '', '', '', '', 0, 'Matrix composed of Isolate and Hydrolyzate\r\n27g of Protein per serving (84%)\r\n12.5g EAA / 5.9g BCAA Naturally present\r\nVery high speed of assimilation\r\nNo Gluten, Aspartame or Preservatives\r\nLow in Lactose', 'This process aims to improve the protein\'s assimilation capabilities by taking over part of the digestion work. It is a predigested and immediately available protein, part of which has been broken down into amino acids and peptides.', '0000-00-00', '0000-00-00', '[\"f-protein\",\"w-1\"]', 1),
(151, 3, 'Hydro Isolate - CHOOCARMEL', 'Whey Isolate is a 2nd generation whey protein concentrate. When the classic concentrate is limited to a protein level of 80%, the whey isolate is capable of reaching 90%. Isolate is an even more concentrated concentrate that has undergone an additional, even finer filtration step. This blanching process eliminates as many carbohydrates and lipids as possible, leaving only the lactalbumins and other serum and globular proteins in the whey. Concentrated and Isolated are the same protein but their concentrations differ. Hydrolyzate is added to this list: It differs from concentrate and isolate by its modified nature. In fact, the hydrolyzate is whey partially degraded via an enzymatic hydrolysis process.', 100, 15, 14, 'https://www.impactnutrition.com.tn/wp-content/uploads/2022/01/ISOLATE-CHOOCARMEL-16KG-600x600.jpg', '', '', '', '', '', 0, 'Matrix composed of Isolate and Hydrolyzate\r\n27g of Protein per serving (84%)\r\n12.5g EAA / 5.9g BCAA Naturally present\r\nVery high speed of assimilation\r\nNo Gluten, Aspartame or Preservatives\r\nLow in Lactose', 'This process aims to improve the protein\'s assimilation capabilities by taking over part of the digestion work. It is a predigested and immediately available protein, part of which has been broken down into amino acids and peptides.', '0000-00-00', '0000-00-00', '[\"f-protein\",\"w-3\"]', 1),
(152, 3, 'Hydro Isolate - FRAISE-CANNELLE', 'Whey Isolate is a 2nd generation whey protein concentrate. When the classic concentrate is limited to a protein level of 80%, the whey isolate is capable of reaching 90%. Isolate is an even more concentrated concentrate that has undergone an additional, even finer filtration step. This blanching process eliminates as many carbohydrates and lipids as possible, leaving only the lactalbumins and other serum and globular proteins in the whey. Concentrated and Isolated are the same protein but their concentrations differ. Hydrolyzate is added to this list: It differs from concentrate and isolate by its modified nature. In fact, the hydrolyzate is whey partially degraded via an enzymatic hydrolysis process.', 80, 15, 14, 'https://www.impactnutrition.com.tn/wp-content/uploads/2022/01/ISOLATE-FRAISE-CANNELLE-700g.jpg', '', '', '', '', '', 0, 'Matrix composed of Isolate and Hydrolyzate\r\n27g of Protein per serving (84%)\r\n12.5g EAA / 5.9g BCAA Naturally present\r\nVery high speed of assimilation\r\nNo Gluten, Aspartame or Preservatives\r\nLow in Lactose', 'This process aims to improve the protein\'s assimilation capabilities by taking over part of the digestion work. It is a predigested and immediately available protein, part of which has been broken down into amino acids and peptides.', '0000-00-00', '0000-00-00', '[\"f-protein\",\"w-1\"]', 1),
(154, 3, 'Hydro Isolate - FRAISE-CANNELLE', 'Whey Isolate is a 2nd generation whey protein concentrate. When the classic concentrate is limited to a protein level of 80%, the whey isolate is capable of reaching 90%. Isolate is an even more concentrated concentrate that has undergone an additional, even finer filtration step. This blanching process eliminates as many carbohydrates and lipids as possible, leaving only the lactalbumins and other serum and globular proteins in the whey. Concentrated and Isolated are the same protein but their concentrations differ. Hydrolyzate is added to this list: It differs from concentrate and isolate by its modified nature. In fact, the hydrolyzate is whey partially degraded via an enzymatic hydrolysis process.', 100, 15, 14, 'https://www.impactnutrition.com.tn/wp-content/uploads/2022/01/ISOLATE-FRAISE-CANNELLE-16g.jpg', '', '', '', '', '', 0, 'Matrix composed of Isolate and Hydrolyzate\r\n27g of Protein per serving (84%)\r\n12.5g EAA / 5.9g BCAA Naturally present\r\nVery high speed of assimilation\r\nNo Gluten, Aspartame or Preservatives\r\nLow in Lactose', 'This process aims to improve the protein\'s assimilation capabilities by taking over part of the digestion work. It is a predigested and immediately available protein, part of which has been broken down into amino acids and peptides.', '0000-00-00', '0000-00-00', '[\"f-protein\",\"w-3\"]', 1),
(155, 3, 'Plant-Protein 100% pistache', 'Whether you are intolerant to milk sugar, lactose, vegetarian or even Vegan, this protein is the solution! This supplement has been designed to provide the same effectiveness as a classic milk protein without the associated constraints and in a tasty way.', 100, 14, 14, 'https://www.impactnutrition.com.tn/wp-content/uploads/2022/09/Vegan-1.8-pistache-600x600.jpg', '', '', '', '', '', 0, '', '21G of Protein per Serving isolated from Brown Rice\r\nIncluding 8G EAA and 4G BCAA\r\nAvena sativa as a source of carbs\r\nFormula enriched with Green Tea Dry Extract and Spirulina\r\nGuaranteed Lactose-Free, Soy-Free and No Added Sugars\r\nContains no Artificial Colors, Aspartame, or Preservatives', '0000-00-00', '0000-00-00', '[\"f-protein\",\"w-2\"]', 1),
(156, 3, 'Plant-Protein 100% Sorgho', 'Whether you are intolerant to milk sugar, lactose, vegetarian or even Vegan, this protein is the solution! This supplement has been designed to provide the same effectiveness as a classic milk protein without the associated constraints and in a tasty way.', 100, 15, 14, 'https://www.impactnutrition.com.tn/wp-content/uploads/2022/09/Vegan-1.8-Sorgho.jpg', '', '', '', '', '', 0, '', '21G of Protein per Serving isolated from Brown Rice\r\nIncluding 8G EAA and 4G BCAA\r\nAvena sativa as a source of carbs\r\nFormula enriched with Green Tea Dry Extract and Spirulina\r\nGuaranteed Lactose-Free, Soy-Free and No Added Sugars\r\nContains no Artificial Colors, Aspartame, or Preservatives', '0000-00-00', '0000-00-00', '[\"f-protein\",\"w-2\"]', 1),
(157, 3, 'Essential Gainer VANILLA-PUDDING', 'Essential Gainer is a highly balanced and complete preparation, made entirely from strictly natural ingredients.', 100, 15, 14, 'https://www.impactnutrition.com.tn/wp-content/uploads/2022/01/ESSENTIAL-GAINER-VANILLA-PUDDING-600x600.jpg', '', '', '', '', '', 0, 'Nutritional analysis    For 1 Serving\r\nEnergy    363.5 calories\r\nTotal Lipids    4.7g\r\nOf which Saturated    2g\r\nSodium    60mg\r\nTotal Carbohydrates    48.3g\r\nDietary fiber    4.5g\r\nTotal Sugars    17.2g\r\nProtein    32g', 'It\'s a simple, powerful formula that combines high-quality protein and carbohydrates, including native concentrated whey protein, oats and plant-based carbohydrates. This weight gain supplement is very popular among people who have difficulty increasing their body weight. Additionally, it can be used beneficially by athletes of all types, regardless of their energy goals.', '0000-00-00', '0000-00-00', '[\"f-protein\",\"w-2\"]', 1),
(158, 3, 'Essential Gainer CHOCOLATE', 'Essential Gainer is a highly balanced and complete preparation, made entirely from strictly natural ingredients.', 100, 15, 14, 'https://www.impactnutrition.com.tn/wp-content/uploads/2022/01/ESSENTIAL-GAINER-CHOCOLATE.jpg', '', '', '', '', '', 0, 'Nutritional analysis    For 1 Serving\r\nEnergy    363.5 calories\r\nTotal Lipids    4.7g\r\nOf which Saturated    2g\r\nSodium    60mg\r\nTotal Carbohydrates    48.3g\r\nDietary fiber    4.5g\r\nTotal Sugars    17.2g\r\nProtein    32g', 'It\'s a simple, powerful formula that combines high-quality protein and carbohydrates, including native concentrated whey protein, oats and plant-based carbohydrates. This weight gain supplement is very popular among people who have difficulty increasing their body weight. Additionally, it can be used beneficially by athletes of all types, regardless of their energy goals.', '0000-00-00', '0000-00-00', '[\"f-protein\",\"w-2\"]', 1),
(159, 3, 'Flavored Creatine 500g', 'Creatine plays a crucial role in rapid energy production during intense, short-duration exercise. It helps regenerate ATP, the main source of cellular energy. In addition to its benefits on athletic performance, this supplement can improve muscle strength, increase muscle strength and accelerate recovery. With its strong scientific basis and documented safety profile, it is one of the most sought-after and effective supplements on the market.', 79, 15, 12, 'https://www.impactnutrition.com.tn/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-07-at-15.31.22-600x600.jpeg', '', '', '', '', '', 0, '', 'A pure Creatine Monohydrate with fine particles\r\n99.9% pure (Content Controlled by High Performance Liquid Chromatography HPLC)\r\nWithout Additives', '0000-00-00', '0000-00-00', '[\"f-creatine\",\"w-0.5\"]', 1),
(160, 3, 'Creatine 500g', 'Creatine plays a crucial role in rapid energy production during intense, short-duration exercise. It helps regenerate ATP, the main source of cellular energy. In addition to its benefits on athletic performance, this supplement can improve muscle strength, increase muscle strength and accelerate recovery. With its strong scientific basis and documented safety profile, it is one of the most sought-after and effective supplements on the market.', 79, 15, 12, 'https://www.impactnutrition.com.tn/wp-content/uploads/2023/06/WhatsApp-Image-2023-06-07-at-15.29.44.jpeg', '', '', '', '', '', 0, '', 'A pure Creatine Monohydrate with fine particles\r\n99.9% pure (Content Controlled by High Performance Liquid Chromatography HPLC)\r\nWithout Additives', '0000-00-00', '0000-00-00', '[\"f-creatine\",\"w-0.5\"]', 1),
(161, 3, 'Creatine Monohydrate CREA-RED-FRUITS', 'Creatine plays a crucial role in rapid energy production during intense, short-duration exercise. It helps regenerate ATP, the main source of cellular energy. In addition to its benefits on athletic performance, this supplement can improve muscle strength, increase muscle strength and accelerate recovery. With its strong scientific basis and documented safety profile, it is one of the most sought-after and effective supplements on the market.', 79, 15, 12, 'https://www.impactnutrition.com.tn/wp-content/uploads/2023/11/CREA-RED-FRUITS-600x600.jpg', '', '', '', '', '', 0, '', 'A pure Creatine Monohydrate with fine particles\r\n99.9% pure (Content Controlled by High Performance Liquid Chromatography HPLC)\r\nWithout Additives', '0000-00-00', '0000-00-00', '[\"f-creatine\",\"w-0.5\"]', 1),
(162, 3, 'Creatine Monohydrate CREA-PASSION', 'Creatine plays a crucial role in rapid energy production during intense, short-duration exercise. It helps regenerate ATP, the main source of cellular energy. In addition to its benefits on athletic performance, this supplement can improve muscle strength, increase muscle strength and accelerate recovery. With its strong scientific basis and documented safety profile, it is one of the most sought-after and effective supplements on the market.', 79, 15, 12, 'https://www.impactnutrition.com.tn/wp-content/uploads/2023/11/CREA-PASSION.jpg', '', '', '', '', '', 0, '', 'A pure Creatine Monohydrate with fine particles\r\n99.9% pure (Content Controlled by High Performance Liquid Chromatography HPLC)\r\nWithout Additives', '0000-00-00', '0000-00-00', '[\"f-creatine\",\"w-0.5\"]', 1),
(163, 2, 'Fresh Foam X 1080 Utility', 'If we only made one model of running shoe, that shoe would be the 1080. The 1080 is unique not only because it is the best running shoe we make, but also because it is the most versatile . The 1080 delivers premium performance for all types of runners, whether they\'re training for a world-class competition or catching the train during rush hour. The Fresh Foam The smooth transitions of pinnacle cushioning underfoot are enhanced with new midsole mapping. There\'s more foam in the wider areas of the midsole and increased flexibility in the narrower areas. The ultra-modern look is also reflected in the upper design of the 1080. The v13 offers a breathable and supportive fit with an engineered mesh upper, for a more aerodynamic overall design.', 100, 14, 8, 'https://nb.scene7.com/is/image/NB/w1080laf_nb_02_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/w1080laf_nb_03_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/w1080laf_nb_05_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/w1080laf_nb_04_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', '', '', 0, 'Composition\r\nTechnical air mesh upper\r\nStyle no : W1080LAF', 'The Fresh Foam Bio-based content is made from renewable resources to help reduce our carbon footprint.\r\nRubber outsole with NDurance technology for greater durability in high-wear areas and to fully exploit the shoes\r\nReflective details designed to catch light', '0000-00-00', '0000-00-00', '[\"f-training shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\",\"white\"]', 1),
(164, 2, 'Fresh Foam X 1080 Utility', 'If we only made one model of running shoe, that shoe would be the 1080. The 1080 is unique not only because it is the best running shoe we make, but also because it is the most versatile . The 1080 delivers premium performance for all types of runners, whether they\'re training for a world-class competition or catching the train during rush hour. The Fresh Foam The smooth transitions of pinnacle cushioning underfoot are enhanced with new midsole mapping. There\'s more foam in the wider areas of the midsole and increased flexibility in the narrower areas. The ultra-modern look is also reflected in the upper design of the 1080. The v13 offers a breathable and supportive fit with an engineered mesh upper, for a more aerodynamic overall design.', 100, 15, 8, 'https://nb.scene7.com/is/image/NB/mrceldv4_nb_05_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/mrceldv4_nb_02_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/mrceldv4_nb_03_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/mrceldv4_nb_06_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', '', '', 0, 'Composition\r\nTechnical air mesh upper\r\nStyle no : W1080LAF', 'The Fresh Foam Bio-based content is made from renewable resources to help reduce our carbon footprint.\r\nRubber outsole with NDurance technology for greater durability in high-wear areas and to fully exploit the shoes\r\nReflective details designed to catch light', '0000-00-00', '0000-00-00', '[\"f-training shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\",\"black\"]', 1),
(165, 2, 'Fresh Foam X 1080 Utility', 'If we only made one model of running shoe, that shoe would be the 1080. The 1080 is unique not only because it is the best running shoe we make, but also because it is the most versatile . The 1080 delivers premium performance for all types of runners, whether they\'re training for a world-class competition or catching the train during rush hour. The Fresh Foam The smooth transitions of pinnacle cushioning underfoot are enhanced with new midsole mapping. There\'s more foam in the wider areas of the midsole and increased flexibility in the narrower areas. The ultra-modern look is also reflected in the upper design of the 1080. The v13 offers a breathable and supportive fit with an engineered mesh upper, for a more aerodynamic overall design.', 100, 15, 8, 'https://nb.scene7.com/is/image/NB/warisbb4_nb_02_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/warisbb4_nb_03_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/warisbb4_nb_05_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/warisbb4_nb_06_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', '', '', 0, 'Composition\r\nTechnical air mesh upper\r\nStyle no : W1080LAF', 'The Fresh Foam Bio-based content is made from renewable resources to help reduce our carbon footprint.\r\nRubber outsole with NDurance technology for greater durability in high-wear areas and to fully exploit the shoes\r\nReflective details designed to catch light', '0000-00-00', '0000-00-00', '[\"f-training shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\",\"black\"]', 1),
(166, 2, 'SHOE DROP SET 2', 'The feeling of the dumbbell in the hands, the impact of the plates, the ringing of the PR bell. Nothing beats a great lifting day, and these adidas training shoes provide outstanding performance during your Strength Training sessions. The 6 mm drop in the midsole gives you great stability and helps you optimize your alignment with each lift. It is dual density for comfort and control. The grippy Traxion outsole ensures maximum grip. The upper is made from at least 50% recycled materials. This product is just one of our solutions to combat plastic waste.', 100, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/32ce137fbb2d4fab9a829432c3d667bf_9366/Chaussure_Dropset_2_Noir_HQ8775_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/73c1ff454bbb4d79a2539a3c7f4882f6_9366/Chaussure_Dropset_2_Noir_HQ8775_02_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/bb963eeb8d7841619555480d4962095b_9366/Chaussure_Dropset_2_Noir_HQ8775_010_hover_standard.jpg', '', '', '', 0, 'The upper contains at least 50% recycled materials.\r\nProduct color: Core Black / Gray Six / Gray Six\r\nProduct code: HQ8775', 'Wide fit.\r\nAdjustable lacing system.\r\nTextile upper with synthetic material inserts.\r\nFeeling of stability.\r\nTPU support reinforcement in the midfoot and heel.\r\nDual density midsole with airflow insert for breathability.\r\nMidsole drop: 6 mm\r\nTraxion outsole.', '0000-00-00', '0000-00-00', '[\"f-running shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\",\"black\"]', 1),
(167, 2, 'SHOE DROP SET 2', 'The feeling of the dumbbell in the hands, the impact of the plates, the ringing of the PR bell. Nothing beats a great lifting day, and these adidas training shoes provide outstanding performance during your Strength Training sessions. The 6 mm drop in the midsole gives you great stability and helps you optimize your alignment with each lift. It is dual density for comfort and control. The grippy Traxion outsole ensures maximum grip. The upper is made from at least 50% recycled materials. This product is just one of our solutions to combat plastic waste.', 100, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/69ae36d65039481abf0b2e42aefc05e3_9366/Chaussure_Dropset_2_Gris_ID4953_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/588548c9998749a291c960968b5dcc81_9366/Chaussure_Dropset_2_Gris_ID4953_02_standard_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/470ca63ffa7b49e4b063e5fd6468c5d0_9366/Chaussure_Dropset_2_Gris_ID4953_03_standard.jpg', '', '', '', 0, 'The upper contains at least 50% recycled materials.\r\nProduct color: Core Black / Gray Six / Gray Six\r\nProduct code: HQ8775', 'Wide fit.\r\nAdjustable lacing system.\r\nTextile upper with synthetic material inserts.\r\nFeeling of stability.\r\nTPU support reinforcement in the midfoot and heel.\r\nDual density midsole with airflow insert for breathability.\r\nMidsole drop: 6 mm\r\nTraxion outsole.', '0000-00-00', '0000-00-00', '[\"f-running shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\",\"white\"]', 1),
(168, 2, 'SHOE DROP SET 2', 'The feeling of the dumbbell in the hands, the impact of the plates, the ringing of the PR bell. Nothing beats a great lifting day, and these adidas training shoes provide outstanding performance during your Strength Training sessions. The 6 mm drop in the midsole gives you great stability and helps you optimize your alignment with each lift. It is dual density for comfort and control. The grippy Traxion outsole ensures maximum grip. The upper is made from at least 50% recycled materials. This product is just one of our solutions to combat plastic waste.', 100, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/c63fd9c974ba4532b5ca3d64833b965a_9366/Chaussure_Dropset_2_Vert_IE5489_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/f574a527a4b74c20ba62ffada1df754a_9366/Chaussure_Dropset_2_Vert_IE5489_02_standard_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/b7001f174cfe4d30949573d5a195dc20_9366/Chaussure_Dropset_2_Vert_IE5489_03_standard.jpg', '', '', '', 0, 'The upper contains at least 50% recycled materials.\r\nProduct color: Core Black / Gray Six / Gray Six\r\nProduct code: HQ8775', 'Wide fit.\r\nAdjustable lacing system.\r\nTextile upper with synthetic material inserts.\r\nFeeling of stability.\r\nTPU support reinforcement in the midfoot and heel.\r\nDual density midsole with airflow insert for breathability.\r\nMidsole drop: 6 mm\r\nTraxion outsole.', '0000-00-00', '0000-00-00', '[\"f-running shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\",\"green\"]', 1),
(169, 2, 'SHOE DROP SET 2', 'The feeling of the dumbbell in the hands, the impact of the plates, the ringing of the PR bell. Nothing beats a great lifting day, and these adidas training shoes provide outstanding performance during your Strength Training sessions. The 6 mm drop in the midsole gives you great stability and helps you optimize your alignment with each lift. It is dual density for comfort and control. The grippy Traxion outsole ensures maximum grip. The upper is made from at least 50% recycled materials. This product is just one of our solutions to combat plastic waste.', 100, 12, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/b76071d9d7aa41488925a73b8873d845_9366/Chaussure_Dropset_2_Orange_IE8049_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/94e253b74e4b4848a9b149d04744543e_9366/Chaussure_Dropset_2_Orange_IE8049_02_standard_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/d81ed879c3674d14a00f41e1d1d66b26_9366/Chaussure_Dropset_2_Orange_IE8049_03_standard.jpg', '', '', '', 0, 'The upper contains at least 50% recycled materials.\r\nProduct color: Core Black / Gray Six / Gray Six\r\nProduct code: HQ8775', 'Wide fit.\r\nAdjustable lacing system.\r\nTextile upper with synthetic material inserts.\r\nFeeling of stability.\r\nTPU support reinforcement in the midfoot and heel.\r\nDual density midsole with airflow insert for breathability.\r\nMidsole drop: 6 mm\r\nTraxion outsole.', '0000-00-00', '0000-00-00', '[\"f-running shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\",\"yellow\"]', 1),
(170, 13, 'PREMIUM 5MM YOGA MAT', 'This 5mm adidas Premium yoga mat helps you stay grounded in posture thanks to its TPE/EVA construction. Firm density is combined with a slightly gummy texture for maximum comfort and stability.', 59, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/fa696364e94f4d60907fc8bf2313e869_9366/Tapis_de_yoga_Premium_5_mm_Bleu_IR2756_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/2a67501792b4455ab7a6ef0d88616e9f_9366/Tapis_de_yoga_Premium_5_mm_Bleu_IR2756_04_standard_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/7352bf36aac141f9abd0edabcba754ef_9366/Tapis_de_yoga_Premium_5_mm_Bleu_IR2756_41_detail.jpg', '', '', '', 0, 'Dimensions: 176cm x 61cm x 0.5cm.\r\n80% TPE, 20% EVA.\r\nFirm construction.\r\nPVC free.\r\nSlightly gummy texture.\r\nGrippy ribbed base.\r\nProduct color: Preloved Blue\r\nProduct code: IR2756', '', '0000-00-00', '0000-00-00', '[\"f-tapis\",\"s-5mm\",\"blue\"]', 1),
(171, 13, 'PREMIUM 5MM YOGA MAT', 'This 5mm adidas Premium yoga mat helps you stay grounded in posture thanks to its TPE/EVA construction. Firm density is combined with a slightly gummy texture for maximum comfort and stability.', 79, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/b68db89663154bb88bd19f4fc66ceaee_9366/Tapis_de_yoga_Premium_5_mm_Noir_GA3309_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/6d524e4ce17946aaab31572cad924493_9366/Tapis_de_yoga_Premium_5_mm_Noir_GA3309_04_standard_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/5ae5b9f19efa45c49b7b1fc0f6bcefa7_9366/Tapis_de_yoga_Premium_5_mm_Noir_GA3309_41_detail.jpg', '', '', '', 0, 'Dimensions: 176cm x 61cm x 0.5cm.\r\n80% TPE, 20% EVA.\r\nFirm construction.\r\nPVC free.\r\nSlightly gummy texture.\r\nGrippy ribbed base.\r\nProduct color: Preloved Blue\r\nProduct code: IR2756', '', '0000-00-00', '0000-00-00', '[\"f-tapis\",\"s-5mm\",\"black\"]', 1),
(172, 13, 'PRIDE BACKPACK', 'The adidas x Pabllo Vittar collection features some of adidas\' classic silhouettes, where each piece is infused with the star\'s signature on-stage style. Inspired by Brazilian swimwear, the collection is designed to adapt to different body types so that everyone feels good about themselves. Inspired by the idea that “Love unites,” the collection celebrates individuality, our bodies as they are and the role of ally. Celebrate the power of love with this adidas Pride backpack. From the Pabllo Vittar collection, this lightweight bag features bright pops of color and an inspiring look.', 149, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/3111c703ccd847448d5ff196f6ca6d52_9366/Sac_a_dos_Pride_Noir_IZ5014_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/9f527b983f6440bbab48b24e1ed2441e_9366/Sac_a_dos_Pride_Noir_IZ5014_05_hover_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/7484f7f92e064b5ea710ad1c8ccc1e3f_9366/Sac_a_dos_Pride_Noir_IZ5014_41_detail.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/b55d80b3861240d8a97e606d0c627528_9366/Sac_a_dos_Pride_Noir_IZ5014_04_standard.jpg', '', '', 0, 'Dimensions: 15cm x 35cm x 43cm.\r\nVolume: 26.5 liters.\r\n100% recycled nylon canvas.\r\nZipped main compartment.\r\nZipped front and side pockets.\r\nAdjustable padded straps.\r\nProduct color: Black / Multicolor\r\nProduct code: IZ5014', 'Whether you\'re crossing campus or crowded airports, the adjustable padded shoulder straps keep you comfortable for the long haul. Numerous zippered pockets keep your personal belongings safe to help you stay focused on your goals, and spread good vibes wherever you go. This product is made with at least 50% recycled materials. By reusing already created materials, we help reduce waste and our dependence on limited resources, in order to reduce the ecological footprint of the products we manufacture.', '0000-00-00', '0000-00-00', '[\"f-backpack\",\"black\"]', 1),
(173, 2, 'ADIPOWER 3 WEIGHTLIFTING SHOE', 'The ultimate platform for lifting heavy loads. This adidas weightlifting shoe gives you superior stability when you lift the heaviest loads thanks to its raised heel and high-density midsole. The ultra-resistant canvas upper is equipped with a lacing system and a strap for superior support. The rubber outsole is specially designed to anchor you well in the carpet. The upper is made from at least 50% recycled materials. This product is just one of our solutions to help end plastic waste.', 100, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/f34c1f6901b84508a3e7ae370089508c_9366/Chaussure_dhalterophilie_Adipower_3_Noir_GY8923_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/52132a5f4b1c41ed86e0ae37008963e6_9366/Chaussure_dhalterophilie_Adipower_3_Noir_GY8923_02_standard_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/cd8b15515cdf44d1b8ddae3700896d1a_9366/Chaussure_dhalterophilie_Adipower_3_Noir_GY8923_03_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/0585b489c7d6426bb4d4ae38000d4476_9366/Chaussure_dhalterophilie_Adipower_3_Noir_GY8923_09_standard.jpg', '', '', 0, 'Standard fit.\r\nLace closure.\r\nDurable canvas upper with hook-and-loop strap at the instep.\r\nFitted fit.\r\nHigh density midsole.\r\nThin, grippy rubber outsole.\r\nShoe weight: 466 g.\r\nMidsole drop: 22 mm (heel: 33 mm / forefoot: 11 mm).\r\nThe upper contains at least 50% recycled materials.\r\nProduct color: Core Black / Cloud White / Gray Three\r\nProduct code: GY8923', 'Wide fit.\r\nAdjustable lacing system.\r\nTextile upper with synthetic material inserts.\r\nFeeling of stability.\r\nTPU support reinforcement in the midfoot and heel.\r\nDual density midsole with airflow insert for breathability.\r\nMidsole drop: 6 mm\r\nTraxion outsole.', '0000-00-00', '0000-00-00', '[\"f-running shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\",\"black\"]', 1),
(174, 2, 'ADIPOWER 3 WEIGHTLIFTING SHOE', 'The ultimate platform for lifting heavy loads. This adidas weightlifting shoe gives you superior stability when you lift the heaviest loads thanks to its raised heel and high-density midsole. The ultra-resistant canvas upper is equipped with a lacing system and a strap for superior support. The rubber outsole is specially designed to anchor you well in the carpet. The upper is made from at least 50% recycled materials. This product is just one of our solutions to help end plastic waste.', 100, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/7279ddd220134a1c9592ae6f00f8bc8d_9366/Chaussure_dhalterophilie_Adipower_3_Blanc_GY8926_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/69aea6b679434a28ab34ae6f00f8d416_9366/Chaussure_dhalterophilie_Adipower_3_Blanc_GY8926_02_standard_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/9da4dbb8067a487195edae6f00f8e00b_9366/Chaussure_dhalterophilie_Adipower_3_Blanc_GY8926_03_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/472cd79ad61f4a0f9c7dae6f00f93138_9366/Chaussure_dhalterophilie_Adipower_3_Blanc_GY8926_09_standard.jpg', '', '', 0, 'Standard fit.\r\nLace closure.\r\nDurable canvas upper with hook-and-loop strap at the instep.\r\nFitted fit.\r\nHigh density midsole.\r\nThin, grippy rubber outsole.\r\nShoe weight: 466 g.\r\nMidsole drop: 22 mm (heel: 33 mm / forefoot: 11 mm).\r\nThe upper contains at least 50% recycled materials.\r\nProduct color: Core Black / Cloud White / Gray Three\r\nProduct code: GY8923', 'Wide fit.\r\nAdjustable lacing system.\r\nTextile upper with synthetic material inserts.\r\nFeeling of stability.\r\nTPU support reinforcement in the midfoot and heel.\r\nDual density midsole with airflow insert for breathability.\r\nMidsole drop: 6 mm\r\nTraxion outsole.', '0000-00-00', '0000-00-00', '[\"f-running shoes\",\"s-43\",\"s-44\",\"s-45\",\"s-46\",\"white\"]', 1),
(175, 13, 'AEROREADY SLEEVES', 'These sleeves keep you dry during your most intense sessions thanks to adidas AEROREADY technology. Reflective logos glow in the dark so you can train in dark conditions. The cuffs stay in place thanks to the silicone. This product is made with at least 70% recycled materials. By reusing already created materials, we help reduce waste and our dependence on limited resources, in order to reduce the ecological footprint of the products we manufacture.', 39, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/3471a2bb34a043f788e617343d7260a6_9366/Manchons_AEROREADY_Rose_JE0410_21_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/6811bb9ccaee4010b252656d3241d39a_9366/Manchons_AEROREADY_Rose_JE0410_23_hover_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/f4fdd5c63b2c456b9196b9325d4f2741_9366/Manchons_AEROREADY_Rose_JE0410_25_model.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/7ba7521946824823ace523189553cab1_9366/Manchons_AEROREADY_Rose_JE0410_01_standard.jpg', '', '', 0, 'Tight fit.\r\nJersey 84% recycled polyester, 16% elastane.\r\nAEROREADY.\r\nStay-in-place edge with silicone interior.\r\nMaterial that wicks away perspiration.\r\nReflective details.\r\nProduct color: Black\r\nProduct code: HY4630\r\n', '', '0000-00-00', '0000-00-00', '[\"f-sleeves\",\"black\"]', 1),
(176, 13, '4ATHLTS MEDIUM CANVAS BAG', 'You have a lot of stuff to carry. This adidas medium canvas bag has all the space you need. Designed to withstand wear and tear, it\'s perfect for matches or training. A zipped compartment allows you to separate your wet clothes or shoes from the rest of your belongings. It is designed from recycled materials from production waste, such as cutting scraps and household waste to reduce the environmental impact of the production of virgin materials.', 99, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/a6f39c217a6446458bfbad9a007bf6d2_9366/Sac_en_toile_4ATHLTS_Medium_Noir_HC7272_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/a3db66abcf354609bfdcad9a007c0472_9366/Sac_en_toile_4ATHLTS_Medium_Noir_HC7272_02_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/2faa4aed76cb436b8bc3ad9a007c1659_9366/Sac_en_toile_4ATHLTS_Medium_Noir_HC7272_04_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/3b2a8d4203aa45f183cead9a007c2c37_9366/Sac_en_toile_4ATHLTS_Medium_Noir_HC7272_05_hover_standard.jpg', '', '', 0, 'Dimensions : 58 cm x 28 cm x 28 cm.\r\nVolume: 39 L.\r\nMain material: 100% nylon outer canvas and 100% TPE inner canvas.\r\nBase: 100% recycled polyester and 100% TPE laminate.\r\nZipped front and side pockets.\r\nVentilated shoe compartment with zipper.\r\nRemovable padded shoulder strap.\r\nDurable coated base.\r\nSpacer, plain weave\r\nContains at least 25% recycled materials.\r\nProduct color: Black / Black\r\nProduct code: HC7272', '', '0000-00-00', '0000-00-00', '[\"f-backpack\",\"black\"]', 1),
(177, 13, '4ATHLTS MEDIUM CANVAS BAG', 'You have a lot of stuff to carry. This adidas medium canvas bag has all the space you need. Designed to withstand wear and tear, it\'s perfect for matches or training. A zipped compartment allows you to separate your wet clothes or shoes from the rest of your belongings. It is designed from recycled materials from production waste, such as cutting scraps and household waste to reduce the environmental impact of the production of virgin materials.', 99, 15, 2, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/5e88fc3417fd49a1b7d321cae13950b2_9366/Sac_en_toile_4ATHLTS_Medium_Vert_IL5754_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/b0eb27191f904181ba378839215b151a_9366/Sac_en_toile_4ATHLTS_Medium_Vert_IL5754_02_standard_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/4730e81984444ca9ab8893f2bee1547a_9366/Sac_en_toile_4ATHLTS_Medium_Vert_IL5754_04_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/685745d3e8d24ffd8263b5743369811a_9366/Sac_en_toile_4ATHLTS_Medium_Vert_IL5754_41_detail.jpg', '', '', 0, 'Dimensions : 58 cm x 28 cm x 28 cm.\r\nVolume: 39 L.\r\nMain material: 100% nylon outer canvas and 100% TPE inner canvas.\r\nBase: 100% recycled polyester and 100% TPE laminate.\r\nZipped front and side pockets.\r\nVentilated shoe compartment with zipper.\r\nRemovable padded shoulder strap.\r\nDurable coated base.\r\nSpacer, plain weave\r\nContains at least 25% recycled materials.\r\nProduct color: Black / Black\r\nProduct code: HC7272', '', '0000-00-00', '0000-00-00', '[\"f-backpack\",\"green\"]', 1),
(178, 3, 'ABE Pre-Workout Shot', 'ABE Pre-Workout Shot from Applied Nutrition has developed a powerful and concentrated formula of essential nutrients to maximize your performance during your strength training workouts.', 100, 15, 10, 'https://cdn.optigura.com/img/prods/20999/main-w500h500@2x.39444.webp', '', '', '', '', '', 0, 'Technical specifications of the product\r\nCaffeine: 200mg to increase alertness, concentration and endurance.\r\nVitamin B3: 50mg (312% of AR) to contribute to normal energy metabolism and the reduction of fatigue.\r\nVitamin B12: 19µg (760% of AR) to support energy metabolism, the functioning of the nervous system and the reduction of fatigue.', 'Why take ABE Pre-Workout Shot?\r\nDiscover the technical specifications and benefits of ABE Pre-Workout Shot for bodybuilding practitioners.', '0000-00-00', '0000-00-00', '[\"f-pre-workout\"]', 1),
(179, 3, 'Black Blood Shot', 'Black Blood Shot is a pre-workout booster in shot form manufactured by the BioTech USA brand. This food supplement contains active substances such as caffeine. We also find beta-alanine, taurine, L-tyrosine but also green tea leaf extract. Its practical packaging in ampoules allows it to be consumed easily and quickly. In addition, it is a sugar-free product.', 100, 15, 10, 'https://cdn.optigura.com/img/prods/17259/main-w500h500@2x.01931.webp', '', '', '', '', '', 0, '', 'Features of Black Blood Shot\r\nContains 200 mg of caffeine per shot\r\nDoes not contain sugar\r\nContains beta-alanine, taurine, L-tyrosine, green tea leaf extract\r\nCaffeine is a natural stimulant widely used in pre-workout formulas. With its high caffeine content, it is not recommended to take it too late in the day due to the risk of insomnia.', '0000-00-00', '0000-00-00', '[\"f-pre-workout\"]', 1),
(180, 3, 'Supernova', 'Supernova is a stimulating and sugar-free pre-workout booster manufactured by the BioTech USA brand. This formula contains no less than 13 active ingredients to support you during training. Supernova is a formula which mainly contains amino acids such as beta-alanine, L-Citrulline-malate, L-Arginine HCI, taurine or even arginine-AKG. We also find niacin, vitamin B6, zinc, caffeine and a creatine complex. In addition, this booster does not contain sugar or carbohydrates.', 100, 15, 10, 'https://cdn.optigura.com/img/prods/17259/main-w500h500@2x.01931.webp', '', '', '', '', '', 0, '', 'Features of Black Blood Shot\r\nContains 200 mg of caffeine per shot\r\nDoes not contain sugar\r\nContains beta-alanine, taurine, L-tyrosine, green tea leaf extract\r\nCaffeine is a natural stimulant widely used in pre-workout formulas. With its high caffeine content, it is not recommended to take it too late in the day due to the risk of insomnia.', '0000-00-00', '0000-00-00', '[\"f-pre-workout\",\"w-0.5\"]', 1),
(181, 3, 'Black Blood CAF+', 'Black Blood CAF+ is a pre-workout type booster manufactured by the BioTech USA brand. This food supplement should not be put into everyone\'s hands because it is ultra-dose in active substances and in particular in caffeine. Therefore, if you are a beginner and if you are not used to consuming this type of product, we advise you to choose another pre-workout.', 100, 15, 10, 'https://cdn.optigura.com/img/prods/9782/main-w500h500@2x.06467.webp', '', '', '', '', '', 0, 'Black Blood CAF+ is therefore an ultra-dose formula which contains 9 active ingredients including 200 mg of caffeine, a NOX formula, amino acids and a ZMB complex which contains zinc, magnesium and vitamin B6. This pre-workout does not contain creatine or sugar.', 'Features of Black Blood CAF+\r\nHigh-caffeine version of the Black Blood BioTech booster\r\nDoes not contain creatine\r\nContains arginine, citrulline malate and beta-alanine\r\nZMB complex', '0000-00-00', '0000-00-00', '[\"f-pre-workout\",\"w-0.5\"]', 1),
(182, 3, 'Black Blood CAF+', 'After is a post-workout formula developed by the BioTech USA brand from 20 active ingredients which act synergistically after training. They contain all the ingredients popular with athletes. It contains carbohydrates, amino acids, creatine, vitamins and minerals. These ingredients provide energy to your muscles that have consumed a lot of calories during a workout. It is important to provide nutrients after a workout to prevent muscle breakdown.', 100, 15, 10, 'https://cdn.optigura.com/img/prods/9789/main-w500h500@2x.06352.webp', '', '', '', '', '', 0, '', 'Features of BioTech USA After\r\nFormula containing fast carbohydrates\r\nSource of creatine with 3g per dose\r\nContains L-Glutamine peptides (the most abundant amino acid in muscles)\r\nVitamins and minerals', '0000-00-00', '0000-00-00', '[\"f-post-workout\",\"w-0.5\"]', 1),
(183, 3, 'MyoFactor', 'MyoFactor is a post-workout type formula developed by the Scitec Nutrition brand. This product mainly contains vitamins, minerals, amino acids, lecithin, inositol, Coleus forskohlii extract, creatine with the Creapure® label.', 100, 15, 9, 'https://cdn.optigura.com/img/prods/16037/main-w500h500@2x.90373.webp', '', '', '', '', '', 0, '', 'Characteristics of MyoFactor from Scitec Nutrition\r\nComplete formula after training\r\nSource of creatine with 3g per dose\r\nContains lecithin, inositol and Coleus forskohlii extract\r\nVitamins and minerals', '0000-00-00', '0000-00-00', '[\"f-post-workout\",\"w-0.5\"]', 1),
(184, 3, 'Cell Tech', 'Cell-Tech is a sports nutrition product composed of creatine monohydrate and carbohydrate powder manufactured by the MuscleTech brand. Cell-Tech creatine contains vitamin C, B6, B12, magnesium, sodium, potassium as well as BCAAs, taurine and L-alanine.', 100, 15, 10, 'https://cdn.optigura.com/img/prods/17133/main-w500h500@2x.96044.webp', '', '', '', '', '', 0, 'Characteristics of Cell-Tech Creatine\r\n3g of creatine monohydrate per dose\r\nBCAA and amino acid matrix\r\n70g of carbohydrates per serving\r\nContains vitamins and minerals\r\n', '', '0000-00-00', '0000-00-00', '[\"f-post-workout\",\"w-0.5\"]', 1),
(185, 3, 'L-Tyrosine', 'L-Tyrosine is a product composed of the amino acid L-Tyrosine , manufactured by the BioTech USA brand. It is an amino acid that can be found in bananas, avocados, as well as in foods rich in protein such as eggs, meat and dairy products.', 100, 15, 11, 'https://cdn.optigura.com/img/prods/10965/main-w500h500@2x.06314.webp', '', '', '', '', '', 0, 'Characteristics of L-Tyrosine from BioTech USA\r\n1000 mg of L-Tyrosine per serving\r\nAlso contains iodine', '', '0000-00-00', '0000-00-00', '[\"f-amino acids\",\"w-0.5\"]', 1),
(186, 3, 'Beta Alanine', 'Beta-Alanine BioTech is a food supplement exclusively composed of beta-alanine manufactured by the BioTech USA brand. This product is marketed in the form of unflavored and sugar-free powder or in the form of 1g mega capsules. Beta-alanine and L-histidine are precursors of carnosine dipeptides.', 100, 15, 11, 'https://cdn.optigura.com/img/prods/2428/main-w500h500@2x.06279.webp', '', '', '', '', '', 0, 'Characteristics of Beta-Alanine BioTech USA\r\n4000mg of beta-alanine\r\nSugar-free formula\r\nHalal certified', '', '0000-00-00', '0000-00-00', '[\"f-amino acids\",\"w-0.5\"]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_coupons`
--

CREATE TABLE `product_coupons` (
  `product_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_coupons`
--

INSERT INTO `product_coupons` (`product_id`, `coupon_id`) VALUES
(2, 27),
(6, 2),
(121, 1),
(122, 1),
(123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `default_tax` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `default_tax`) VALUES
(1, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_info`
--

CREATE TABLE `shipping_info` (
  `shipping_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_postal_code` varchar(20) DEFAULT NULL,
  `shipping_country` varchar(100) DEFAULT NULL,
  `shipping_phone` varchar(20) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_info`
--

INSERT INTO `shipping_info` (`shipping_id`, `order_id`, `customer_id`, `shipping_address`, `shipping_city`, `shipping_postal_code`, `shipping_country`, `shipping_phone`, `first_name`, `last_name`) VALUES
(207, 214, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(208, 215, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(209, 216, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(210, 217, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(211, 218, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(212, 219, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(213, 220, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(214, 221, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(215, 222, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(216, 223, 2, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'aziz', 'guemati'),
(217, 224, 2, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'aziz', 'guemati'),
(218, 225, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(219, 226, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(220, 227, 1, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'AA', 'BB'),
(221, 228, 2, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'aziz', 'guemati'),
(222, 229, 2, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'aziz', 'guemati'),
(223, 230, 16, 'Rue Mamata N°1 BOUMHEL BASSATINE (Presque à côté de [La Grand café opéra],[https://maps.app.goo.gl/SVqFor14Gkk1YUZP7])', 'ben arous', '2097', NULL, '20204433', 'aziz', 'guemati');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(100) NOT NULL,
  `slider_bg_image` varchar(255) NOT NULL,
  `slider_bg_image_dark` varchar(255) DEFAULT NULL,
  `slider_text` text DEFAULT NULL,
  `slider_button_text` varchar(50) DEFAULT NULL,
  `slider_button_link` varchar(255) DEFAULT NULL,
  `slider_order` int(11) DEFAULT 0,
  `slider_text_position` varchar(50) DEFAULT 'center-center',
  `slider_text_transition` varchar(255) DEFAULT 'x:[175%];y:0px;opacity:1;',
  `slider_button_position` varchar(50) DEFAULT 'center-center',
  `slider_button_transition` varchar(255) DEFAULT 'y:50px;opacity:0;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_name`, `slider_bg_image`, `slider_bg_image_dark`, `slider_text`, `slider_button_text`, `slider_button_link`, `slider_order`, `slider_text_position`, `slider_text_transition`, `slider_button_position`, `slider_button_transition`) VALUES
(1, 'Slider 1', 'assets/images/slider/bg/1.png', 'assets/images/slider/bg/2.png', '<span style=\"color:#606da6;\">Unleash</span> Your<br>Inner Athlete<br> <p class=\"text-left\" style=\"text-align: justify;\">Fuel your body right and achieve your fitness goals  with<br> our top-quality gear.</p>', 'SHOP NOW', 'http://localhost/msport/shop.php', 1, 'left-top', 'x:[175%];y:0px;opacity:1;', 'left-top', 'y:50px;opacity:0;'),
(2, 'Slider 2', 'assets/images/slider/bg/3.png', 'assets/images/slider/bg/4.png', '<div style=\"display: flex; flex-direction: column;\">\r\n    <div class=\"text-left\">Get Fit</div>\r\n    <span class=\"text-left\" style=\"color:#606da6;\">Get Going</span>\r\n    <p class=\"text-left\" style=\"text-align: justify; margin-top: 0;\">We empower you to transform your body and mind<br>Elevate your fitness journey.</p>\r\n</div>\r\n', 'EXPLORE NOW', 'http://localhost/msport/shop.php', 2, 'right-top', 'x:[-100%];y:0px;opacity:1;', 'right-top', 'y:50px;opacity:0;'),
(3, 'Slider 3', 'assets/images/slider/bg/5.png', 'assets/images/slider/bg/6.png', 'Get in <span style=\"color:#606da6;\">Shape</span>\r\n<p class=\"mt-4 mb-0\" style=\"text-align: justify; margin: 0;\" >Boost your performance with Our range <br> of premium supplements.</p>\r\n', 'SHOP NOW', 'http://localhost/msport/shop.php', 3, 'center-top', 'x:[175%];y:0px;opacity:1;', 'center-top', 'y:-50px;opacity:0;');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(175, 2, 128),
(176, 2, 132),
(177, 2, 139),
(179, 2, 4),
(180, 16, 135),
(182, 1, 141),
(186, 1, 4),
(187, 2, 135),
(188, 1, 128);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blogreviews`
--
ALTER TABLE `blogreviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`),
  ADD KEY `fk_coupons_product_id` (`product_id`),
  ADD KEY `coupon_code` (`coupon_code`);

--
-- Indexes for table `cta_sections`
--
ALTER TABLE `cta_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `delivery_methods`
--
ALTER TABLE `delivery_methods`
  ADD PRIMARY KEY (`method_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_emails`
--
ALTER TABLE `newsletter_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `invoice_no` (`invoice_no`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`method_id`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`pcategory_id`),
  ADD UNIQUE KEY `pcategory_name` (`pcategory_name`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`pcategory_id`);

--
-- Indexes for table `product_coupons`
--
ALTER TABLE `product_coupons`
  ADD PRIMARY KEY (`product_id`,`coupon_id`),
  ADD KEY `coupon_id` (`coupon_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `blogreviews`
--
ALTER TABLE `blogreviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=822;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cta_sections`
--
ALTER TABLE `cta_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `delivery_methods`
--
ALTER TABLE `delivery_methods`
  MODIFY `method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `newsletter_emails`
--
ALTER TABLE `newsletter_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `pcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_info`
--
ALTER TABLE `shipping_info`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogreviews`
--
ALTER TABLE `blogreviews`
  ADD CONSTRAINT `blogreviews_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`),
  ADD CONSTRAINT `blogreviews_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `fk_coupons_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD CONSTRAINT `fk_product_reviews_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `fk_product_reviews_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`pcategory_id`) REFERENCES `productcategories` (`pcategory_id`);

--
-- Constraints for table `product_coupons`
--
ALTER TABLE `product_coupons`
  ADD CONSTRAINT `product_coupons_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `product_coupons_ibfk_2` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`coupon_id`);

--
-- Constraints for table `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD CONSTRAINT `shipping_info_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `shipping_info_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
