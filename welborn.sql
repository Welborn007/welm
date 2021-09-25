-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: custsql-ipg109.eigbox.net
-- Generation Time: Apr 19, 2020 at 10:43 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.0.33-0ubuntu0.16.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `welborn`
--

-- --------------------------------------------------------

--
-- Table structure for table `wm_about_details`
--

CREATE TABLE `wm_about_details` (
  `about_id` int(11) NOT NULL,
  `about_details` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wm_about_details`
--

INSERT INTO `wm_about_details` (`about_id`, `about_details`) VALUES
(1, '<h1><strong>Hello! My name is Welborn Machado.</strong></h1>\n\n<p><em>I am a technical, yet straightforward Android developer and also a part-time freelancer. I&#39;m based in Mumbai, India and work for a start-up. I have more than 2.9 years of experience working in the IT domain.</em></p>\n\n<p><em>I am a Bachelor&#39;s of Engineering in IT from St.Francis Institute Of Technology passed out 2013 batch. I am also a Certified Android Developer from Suven Consultants. Till now I have worked on around 10 projects for both my employers as well as my clients.</em></p>\n\n<p><em>I have a strong background in Android Development, API Web Services such as REST-JSON, SQLite Database, Social Integrations, Push Notifications and the Android Framework. Currently, I&#39;m developing a social networking app called Krian which is an in-house application for my current company, which initiates to bring people from different parts of world under one umbrella.</em></p>\n\n<p><em>I consider myself lucky; I get to spend almost every day doing what I love, delivering great software, for companies I work with.</em><br />\n&nbsp;</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `wm_admin_user_details`
--

CREATE TABLE `wm_admin_user_details` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(2000) DEFAULT NULL,
  `lastname` varchar(2000) DEFAULT NULL,
  `fullname` varchar(2000) DEFAULT NULL,
  `mobilenumber` varchar(2000) DEFAULT NULL,
  `emailid` varchar(2000) DEFAULT NULL,
  `password` varchar(2000) DEFAULT NULL,
  `avatar` varchar(2000) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1' COMMENT '1->active, 0->inactive',
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wm_admin_user_details`
--

INSERT INTO `wm_admin_user_details` (`user_id`, `firstname`, `lastname`, `fullname`, `mobilenumber`, `emailid`, `password`, `avatar`, `status`, `upload_date`, `ip`) VALUES
(1, 'Welborn', 'Machado', 'Welborn Machado', '9988774455', 'machadowelborn@gmail.com', '5Xchange$', NULL, '1', '2016-05-04 12:05:56', NULL),
(2, 'Welborn', 'Machado', 'Welborn Machado', '9221460041', 'admin@gmail.com', 'Welborn@47', NULL, '1', '2017-05-06 07:51:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wm_blog_details`
--

CREATE TABLE `wm_blog_details` (
  `blog_id` int(11) NOT NULL,
  `title` text,
  `image_name` text,
  `description` text,
  `status` enum('0','1') DEFAULT '1' COMMENT '1->active, 0->inactive',
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wm_blog_details`
--

INSERT INTO `wm_blog_details` (`blog_id`, `title`, `image_name`, `description`, `status`, `upload_date`) VALUES
(5, 'Vasai Birds in DNA : Bird enthusiasts to fund app called Vasai Birds', 'QBdj87tlPy1472386113bird-b.jpg', '<p>The bird enthusiasts have taken the step in order to highlight the rich biodiversity of one the last green zones left on the outskirts of Mumbai.</p>\n\n<pre>\nhttp://www.dnaindia.com/india/report-mumbai-bird-enthusiasts-to-fund-app-called-vasai-birds-2215439</pre>\n', '1', '2016-08-28 12:08:33'),
(6, 'Media Konnect in Forbes India', 'FoyZ0R6l7r1472386869landing.jpg', '<h3>Media Konnect promises to universalise the filmmaking process</h3>\n\n<pre>\nhttp://forbesindia.com/article/special/media-konnect-promises-to-universalise-the-filmmaking-process/43845/1</pre>\n', '1', '2016-08-28 12:24:57'),
(3, 'Android Studio 2.0', 'iEJcTp9j7m1463846805Android_Studio_icon.png', '<p>Android Studio 2.0 includes the following new features that Android developer can use in their workflow :</p>\n\n<ul>\n <li><strong>Instant Run</strong> - For every developer who loves faster build speeds. Make changes and see them appear live in your running app. With many build/run accelerations ranging from VM hot swapping to <a href=\"http://developer.android.com/tools/building/building-studio.html?utm_campaign=android_launch_studio_040716&utm_source=anddev&utm_medium=blog#instant-run\">warm swapping app resources</a>, Instant Run will save you time every day.</li>\n <li><strong>Android Emulator</strong> - The new emulator runs ~3x faster than Android&rsquo;s previous emulator, and with ADB enhancements you can now push apps and data 10x faster to the emulator than to a physical device. Like a physical device, the official Android emulator also includes <a href=\"https://developers.google.com/android/?utm_campaign=android_launch_studio_040716&utm_source=anddev&utm_medium=blog\">Google Play Services</a> built-in, so you can test out more API functionality. Finally, the new emulator has rich new features to manage calls, battery, network, GPS, and more.</li>\n <li><strong>Cloud Test Lab Integration</strong> - Write once, run anywhere. Improve the quality of your apps by quickly and easily testing on a wide range of physical Android devices in the <a href=\"http://developer.android.com/training/testing/start/index.html?utm_campaign=android_launch_studio_040716&utm_source=anddev&utm_medium=blog#run-ctl\">Cloud Test Lab</a> right from within Android Studio.</li>\n <li><strong>App Indexing Code Generation &amp; Test</strong> - Help promote the visibility your app in Google Search for your users by adding auto-generated URLS with the App Indexing feature in Android Studio. With a few click you can add indexable URL links that you can test all within the IDE.</li>\n <li><strong>GPU Debugger Preview</strong> - For those of you developing OpenGL ES based games or apps, you can now see each frame and the GL state with the new GPU debugger. Uncover and diagnosis GL rendering issues by capturing and analyzing the GPU stream from your Android device.</li>\n <li><strong>IntelliJ 15 Update</strong> - Android Studio is built on the world class Intellij coding platform. Check out the latest Intellij features</li>\n</ul>\n', '1', '2016-05-21 16:06:45'),
(4, 'Working with Volley Library', 'GkmpKvSOEI1466836006volleycover.png', '<p>&nbsp;&nbsp;1] Open <strong>build.gradle</strong> and add volley support by adding to dependencies</p>\n\n<p><code>compile &#39;com.android.volley:volley:1.0.0&#39;</code></p>\n\n<p>2] <strong>Create a Utils package</strong></p>\n\n<p><strong>Add LruBitmapCache.java </strong>file</p>\n\n<pre>\n<code>import com.android.volley.toolbox.ImageLoader.ImageCache;</code>\n\n<code>import android.graphics.Bitmap;</code>\n\n<code>import android.support.v4.util.LruCache;</code>\n\n<code>public class LruBitmapCache extends LruCache implements</code>\n\n<code>        ImageCache {</code>\n\n<code>    public static int getDefaultLruCacheSize() {</code>\n\n<code>        final int maxMemory = (int) (Runtime.getRuntime().maxMemory() / 1024);</code>\n\n<code>        final int cacheSize = maxMemory / 8;</code>\n\n<code>        return cacheSize;</code>\n\n<code>    }</code>\n\n<code>    public LruBitmapCache() {</code>\n\n<code>        this(getDefaultLruCacheSize());</code>\n\n<code>    }</code>\n\n<code>    public LruBitmapCache(int sizeInKiloBytes) {</code>\n\n<code>        super(sizeInKiloBytes);</code>\n\n<code>    }</code>\n\n<code>    @Override</code>\n\n<code>    protected int sizeOf(String key, Bitmap value) {</code>\n\n<code>        return value.getRowBytes() * value.getHeight() / 1024;</code>\n\n<code>    }</code>\n\n<code>    @Override</code>\n\n<code>    public Bitmap getBitmap(String url) {</code>\n\n<code>        return get(url);</code>\n\n<code>    }</code>\n\n<code>    @Override</code>\n\n<code>    public void putBitmap(String url, Bitmap bitmap) {</code>\n\n<code>        put(url, bitmap);</code>\n\n<code>    }</code>\n\n<code>}</code></pre>\n\n<p>&nbsp;</p>\n\n<p>3]<strong> Add the AppController.java in your app package that handles all volley functions</strong></p>\n\n<pre>\n<code>import android.app.Application;\n\nimport android.text.TextUtils;\n\nimport com.android.volley.Request;\n\nimport com.android.volley.RequestQueue;\n\nimport com.android.volley.toolbox.ImageLoader;\n\nimport com.android.volley.toolbox.Volley;\n\npublic class AppController extends Application {\n\n    public static final String TAG = AppController.class\n\n            .getSimpleName();\n\n    private RequestQueue mRequestQueue;\n\n    private ImageLoader mImageLoader;\n\n    private static AppController mInstance;\n\n    @Override\n\n    public void onCreate() {\n\n        super.onCreate();\n\n        mInstance = this;\n\n    }\n\n    public static synchronized AppController getInstance() {\n\n        return mInstance;\n\n    }\n\n    public RequestQueue getRequestQueue() {\n\n        if (mRequestQueue == null) {\n\n            mRequestQueue = Volley.newRequestQueue(getApplicationContext());\n\n        }\n\n        return mRequestQueue;\n\n    }\n\n    public ImageLoader getImageLoader() {\n\n        getRequestQueue();\n\n        if (mImageLoader == null) {\n\n            mImageLoader = new ImageLoader(this.mRequestQueue,\n\n                    new LruBitmapCache());\n\n        }\n\n        return this.mImageLoader;\n\n    }\n\n    public void addToRequestQueue(Request req, String tag) {\n\n        // set the default tag if tag is empty\n\n        req.setTag(TextUtils.isEmpty(tag) ? TAG : tag);\n\n        getRequestQueue().add(req);\n\n    }\n\n    public void addToRequestQueue(Request req) {\n\n        req.setTag(TAG);\n\n        getRequestQueue().add(req);\n\n    }\n\n    public void cancelPendingRequests(Object tag) {\n\n        if (mRequestQueue != null) {\n\n            mRequestQueue.cancelAll(tag);\n\n        }\n\n    }\n\n}</code></pre>\n\n<p>&nbsp;</p>\n\n<p>4] Open<strong> Manifest.xml</strong> file and name your app with reference to <strong>AppController.java </strong>in the <strong>Application</strong> Tag</p>\n\n<p>5] <strong>GET &amp; POST</strong> Methods of Volley Networking</p>\n\n<p><strong>JSON Object GET Request</strong></p>\n\n<pre>\n<code>// Tag used to cancel the request\n\nString tag_js&gt;&quot;json_obj_req&quot;;\n\nString url = &quot;<a href=\"http://api.androidhive.info/volley/person_object.json\">http:your-url</a>&quot;;\n\n\n      \n\nProgressDialog pDialog = new ProgressDialog(this);\n\npDialog.setMessage(&quot;Loading...&quot;);\n\npDialog.show();  \n\n\n      \n\n        JsonObjectRequest js&gt;new JsonObjectRequest(Method.GET,\n\n                url, null,\n\n                new Response.Listener() {\n\n                    @Override\n\n                    public void onResponse(JSONObject response) {\n\n                        Log.d(TAG, response.toString());\n\n                        pDialog.hide();\n\n                    }\n\n                }, new Response.ErrorListener() {\n\n                    @Override\n\n                    public void onErrorResponse(VolleyError error) {\n\n                        VolleyLog.d(TAG, &quot;Error: &quot; + error.getMessage());\n\n                        // hide the progress dialog\n\n                        pDialog.hide();\n\n                    }\n\n                });\n\n// Adding request to request queue\n\nAppController.getInstance().addToRequestQueue(jsonObjReq, tag_json_obj);</code></pre>\n\n<p><strong>JSON ARRAY GET Request</strong></p>\n\n<pre>\n<code>// Tag used to cancel the request\n\nString tag_js&gt;&quot;json_array_req&quot;;\n\nString url = &quot;<a href=\"http://api.androidhive.info/volley/person_array.json\">http://your-url</a>&quot;;\n\n\n       \n\nProgressDialog pDialog = new ProgressDialog(this);\n\npDialog.setMessage(&quot;Loading...&quot;);\n\npDialog.show();   \n\n\n       \n\nJsonArrayRequest req = new JsonArrayRequest(url,\n\n                new Response.Listener() {\n\n                    @Override\n\n                    public void onResponse(JSONArray response) {\n\n                        Log.d(TAG, response.toString());       \n\n                        pDialog.hide();            \n\n                    }\n\n                }, new Response.ErrorListener() {\n\n                    @Override\n\n                    public void onErrorResponse(VolleyError error) {\n\n                        VolleyLog.d(TAG, &quot;Error: &quot; + error.getMessage());\n\n                        pDialog.hide();\n\n                    }\n\n                });\n\n// Adding request to request queue\n\nAppController.getInstance().addToRequestQueue(req, tag_json_arry);</code></pre>\n\n<p><strong>JSON ARRAY Post Request</strong></p>\n\n<pre>\n<code><strong>private void </strong>fetchSpeciesDetailsData() {\n\n\n    <strong>dialog </strong>= <strong>new </strong>Dialog(SpeciesDetails.<strong>this</strong>);\n\n    <strong>dialog</strong>.requestWindowFeature(Window.<em>FEATURE_NO_TITLE</em>);\n\n    <strong>dialog</strong>.setContentView(R.layout.<em>progressdialog</em>);\n\n    <strong>dialog</strong>.setCancelable(<strong>false</strong>);\n\n    <strong>dialog</strong>.setCanceledOnTouchOutside(<strong>false</strong>);\n\n    <strong>dialog</strong>.getWindow().setBackgroundDrawable(<strong>new </strong>ColorDrawable(android.graphics.Color.<em>TRANSPARENT</em>));\n\n    <strong>dialog</strong>.show();\n\n\n     JSONObject js&gt;new JSONObject();\n\n    <strong>try </strong>{\n\n        jsonObject.put(<strong>&quot;species_id&quot;</strong>,getIntent().getStringExtra(<strong>&quot;Species_id&quot;</strong>));\n\n        jsonObject.put(<strong>&quot;action&quot;</strong>, <strong>&quot;speciesdtls&quot;</strong>);\n\n    } <strong>catch </strong>(Exception e) {\n\n        e.getStackTrace();\n\n\n    }\n\n\n     JsonArrayRequest js&gt;new JsonArrayRequest(Request.Method.<em>POST</em>,Constants.<em>WEB_URL</em>,jsonObject,\n\n            <strong>new </strong>Response.Listener() {\n\n                @Override\n\n                <strong>public void </strong>onResponse(JSONArray response) {\n\n                    Log.<em>d</em>(<em>TAG</em>, response.toString());\n\n\n                    parseJsonFeed(response);\n\n\n\n                }\n\n            }, <strong>new </strong>Response.ErrorListener() {\n\n        @Override\n\n        <strong>public void </strong>onErrorResponse(VolleyError error) {\n\n            VolleyLog.<em>d</em>(<em>TAG</em>, <strong>&quot;Error: &quot; </strong>+ error.getMessage());\n\n\n        }\n\n    });\n\n\n    jsonArrayRequest.setRetryPolicy(<strong>new </strong>DefaultRetryPolicy(\n\n            30000,\n\n            DefaultRetryPolicy.<em>DEFAULT_MAX_RETRIES</em>,\n\n            DefaultRetryPolicy.<em>DEFAULT_BACKOFF_MULT</em>));\n\n\n    <em>// Adding request to request queue</em>\n\n    AppController.<em>getInstance</em>().addRequestToQueue(jsonArrayRequest, <strong>&quot;MydeatilsRequest&quot;</strong>);\n\n}</code></pre>\n\n<p><strong>JSON OBJECT POST Request</strong></p>\n\n<pre>\n<code>// Tag used to cancel the request\n\nString tag_js&gt;&quot;json_obj_req&quot;;\n\nString url = &quot;<a href=\"http://api.androidhive.info/volley/person_object.json\">http://your-url</a>&quot;;\n\n\n       \n\nProgressDialog pDialog = new ProgressDialog(this);\n\npDialog.setMessage(&quot;Loading...&quot;);\n\npDialog.show();   \n\n\n       \n\n        JsonObjectRequest js&gt;new JsonObjectRequest(Method.POST,\n\n                url, null,\n\n                new Response.Listener() {\n\n                    @Override\n\n                    public void onResponse(JSONObject response) {\n\n                        Log.d(TAG, response.toString());\n\n                        pDialog.hide();\n\n                    }\n\n                }, new Response.ErrorListener() {\n\n                    @Override\n\n                    public void onErrorResponse(VolleyError error) {\n\n                        VolleyLog.d(TAG, &quot;Error: &quot; + error.getMessage());\n\n                        pDialog.hide();\n\n                    }\n\n                }) {\n\n            /**\n\n             * Passing some request headers\n\n             * */\n\n            @Override\n\n            public Map getHeaders() throws AuthFailureError {\n\n                HashMap headers = new HashMap();\n\n                headers.put(&quot;Content-Type&quot;, &quot;application/json&quot;);\n\n                headers.put(&quot;apiKey&quot;, &quot;xxxxxxxxxxxxxxx&quot;);\n\n                return headers;\n\n            }\n\n        };\n\n// Adding request to request queue\n\nAppController.getInstance().addToRequestQueue(jsonObjReq, tag_json_obj);</code></pre>\n\n<p>6] <strong>JSON Volley String Request</strong></p>\n\n<pre>\n<code>// Tag used to cancel the request\n\nString  tag_string_req = &quot;string_req&quot;;\n\nString url = &quot;<a href=\"http://api.androidhive.info/volley/string_response.html\">http://your-url</a>&quot;;\n\n        \n\nProgressDialog pDialog = new ProgressDialog(this);\n\npDialog.setMessage(&quot;Loading...&quot;);\n\npDialog.show();   \n\n        \n\nStringRequest strReq = new StringRequest(Method.GET,\n\n                url, new Response.Listener() {\n\n                    @Override\n\n                    public void onResponse(String response) {\n\n                        Log.d(TAG, response.toString());\n\n                        pDialog.hide();\n\n                    }\n\n                }, new Response.ErrorListener() {\n\n                    @Override\n\n                    public void onErrorResponse(VolleyError error) {\n\n                        VolleyLog.d(TAG, &quot;Error: &quot; + error.getMessage());\n\n                        pDialog.hide();\n\n                    }\n\n                });\n\n// Adding request to request queue\n\nAppController.getInstance().addToRequestQueue(strReq, tag_string_req);</code></pre>\n\n<p><strong>7</strong> <strong>Image Request using NetworkImageview&nbsp; </strong></p>\n\n<pre>\n<code>ImageLoader imageLoader = AppController.getInstance().getImageLoader();\n\n\n// If you are using NetworkImageView\n\nimgNetWorkView.setImageUrl(Const.URL_IMAGE, imageLoader);</code></pre>\n\n<p><strong>Loading image in ImageView</strong></p>\n\n<pre>\n<code>ImageLoader imageLoader = AppController.getInstance().getImageLoader();\n\n\n// If you are using normal ImageView\n\nimageLoader.get(Const.URL_IMAGE, new ImageListener() {\n\n\n    @Override\n\n    public void onErrorResponse(VolleyError error) {\n\n        Log.e(TAG, &quot;Image Load Error: &quot; + error.getMessage());\n\n    }\n\n\n    @Override\n\n    public void onResponse(ImageContainer response, boolean arg1) {\n\n        if (response.getBitmap() != null) {\n\n            // load image into imageview\n\n            imageView.setImageBitmap(response.getBitmap());\n\n        }\n\n    }\n\n});</code></pre>\n\n<p><strong>8 Setting Retry Policy</strong></p>\n\n<pre>\n<code>jsonArrayRequest.setRetryPolicy(<strong>new </strong>DefaultRetryPolicy(\n\n        30000,\n\n        DefaultRetryPolicy.<em>DEFAULT_MAX_RETRIES</em>,\n\n        DefaultRetryPolicy.<em>DEFAULT_BACKOFF_MULT</em>));</code></pre>\n\n<p>&nbsp;&nbsp;</p>\n\n<p>&nbsp;</p>\n', '1', '2016-06-25 07:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `wm_contact_details`
--

CREATE TABLE `wm_contact_details` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(2000) DEFAULT NULL,
  `contact_email` varchar(2000) DEFAULT NULL,
  `message` text,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wm_contact_details`
--

INSERT INTO `wm_contact_details` (`contact_id`, `contact_name`, `contact_email`, `message`, `upload_time`, `ip`) VALUES
(1, 'Rajesh', 'rajeshpalande77@gmail.com', 'xzczxcxzczc c zc zxzx', '2016-04-26 14:21:47', '::1'),
(2, 'Rajesh', 'rajeshpalande77@gmail.com', 'xzc zxc xzc xzc', '2016-04-26 14:22:32', '::1'),
(3, 'Rajesh', 'rajeshpalande77@gmail.com', 'test', '2016-04-26 17:36:50', '103.199.128.92'),
(4, 'Anish', 'anish@gmail.com', 'Are you looking to hire an Android app developer and want to discuss a project or simply want to say hi?\n\nFill in the form below and I\'ll get back to you soon.', '2016-04-27 04:46:08', '49.248.35.122'),
(5, '0', '0', '0', '2016-05-06 20:36:06', '66.249.69.201'),
(6, 'Rajesh', 'rajesh.palande@logicnests.com', '\n\nDonec pharetra, augue et viverra fermentum, sapien orci pellentesque elit, vitae vestibulum mi est eget elit. Donec pellentesque tellus vitae lorem lobortis cursus id sed lacus. Nullam a erat a eros elementum iaculis non aliquam nisi. Donec mattis et eros in porttitor. Nulla gravida sem sed dignissim dignissim. Phasellus vel libero et urna lobortis ornare ac non risus. Vestibulum in massa ullamcorper, commodo metus quis, commodo nunc. Proin placerat odio non mi laoreet aliquam. In posuere lorem nec mollis lacinia. Nam consequat tempor tellus non cursus. Vivamus consequat quis ex id elementum. Fusce et volutpat mi.\n\nDonec pharetra, augue et viverra fermentum, sapien orci pellentesque elit, vitae vestibulum mi est eget elit. Donec pellentesque tellus vitae lorem lobortis cursus id sed lacus. Nullam a erat a eros elementum iaculis non aliquam nisi. Donec mattis et eros in porttitor. Nulla gravida sem sed dignissim dignissim. Phasellus vel libero et urna lobortis ornare ac non risus. Vestibulum in massa ullamcorper, commodo metus quis, commodo nunc. Proin placerat odio non mi laoreet aliquam. In posuere lorem nec mollis lacinia. Nam consequat tempor tellus non cursus. Vivamus consequat quis ex id elementum. Fusce et volutpat mi.\n', '2016-05-11 10:11:03', '49.248.35.122'),
(7, 'Welbon', 'welbornmachado@gmail.com', 'sample message', '2016-05-21 13:56:18', '103.226.85.9'),
(8, 'Abc', 'pandey@gmail.com', '', '2016-05-21 18:10:26', '64.233.173.9'),
(9, 'Mark Zukeberg ', 'markzukeberg@gmail.com', 'Facebook needs u', '2016-05-22 06:42:02', '49.32.36.95'),
(10, 'Fuck you', 'fuck@sex.com', '[removed]alert&#40;\'You are fucked!\'&#41;;[removed]', '2016-06-04 19:50:57', '183.87.45.6'),
(11, 'claudio figueroa', 'miamistudio@bellsouth.net', 'Hi Machado:\nIm looking for some help to Add App indexing codes to my App manifesto in order to make my app showing on google search results. I have no clue at all of how I can do it since Im not a developer.\nI would like to know if you are familiar with app indexing and know if you can help me with that and how much it will cost.\n\nMy app is not a native app ( I don\'t know what that means) I have the sdk from my app.\n\nThank you\n\nclaudio figuera\n ', '2016-09-12 19:14:54', '12.161.42.2'),
(12, '0', '0', '0', '2017-01-16 21:01:19', '66.249.66.193'),
(13, 'Neeraj Gupta', 'sales@prozia.info', 'Please share your contact number to discuss further on android Development projects \nPing me at 08826138138 \nRegards', '2017-02-06 06:52:48', '182.69.225.193'),
(14, 'Julian Cooper', 'juliancooper.mkt@gmail.com', 'Do you wish you could increase your online leads? We have helped a lot of businesses thrive in this market and we can help you! Simply hit reply and I’ll share with you the cost and the benefits.', '2017-02-22 06:53:40', '182.68.181.153');

-- --------------------------------------------------------

--
-- Table structure for table `wm_portfolio_details`
--

CREATE TABLE `wm_portfolio_details` (
  `portfolio_id` int(11) NOT NULL,
  `title` text,
  `image_name` text,
  `description` text,
  `app_link` varchar(5000) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1' COMMENT '1->active, 0->inactive',
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wm_portfolio_details`
--

INSERT INTO `wm_portfolio_details` (`portfolio_id`, `title`, `image_name`, `description`, `app_link`, `status`, `upload_date`) VALUES
(1, 'Creative Jewel', 'KFwW10c4aP1463847875Screenshot_20160521-215027_nexus4_angle1.png', '<p>CREATIVE JEWEL&rdquo; Name itself speaks about the Creativity of our Jewellery. Manufacturer of Rhodium, Casting, Handmade &amp; Cz Fancy Jewellery with all New concepts.<br />\nStockist of 91.6 Gold Jewellery &amp; Other Melting as Per Order(Client Requirements).</p>\n', 'https://play.google.com/store/apps/details?id=infotech.atom.com.creativejewel&hl=en', '1', '2016-05-21 16:24:35'),
(4, 'JimTrade.com - Enterprise based mobile application for B2B portal', '2CfMT3Rnm61463847467Screenshot_20160521-213904_nexus4_angle1.png', '<p>Buyers all over the world can now keep themselves updated free of cost, on Indian products without referring to numerous publications &amp; search engines.</p>\n\n<p><strong>JimTrade App provides free access to 5 Lacs+ Product Profiles from Indian Manufacturers</strong></p>\n\n<p>JimTrade.com is India&#39;s largest on-line business directory that facilitates global trade, specifically focusing on the Indian market, by providing information to buyers. It provides complete and up-to-date information on Indian products and manufacturers. JimTrade App is the number one destination for buyers to source Indian products. Category-wise product classification enables the buyers to choose from a wide range of products. Each product profile includes its images, description, features and manufacturer&rsquo;s contact details.</p>\n\n<p>JimTrade Edge<br />\n1. More than 5 Lacs+ Indian product profiles<br />\n2. 20,000+ product categories<br />\n3. Thousands of new product profiles every day<br />\n4. Industry-wise e-newsletter for latest products<br />\n5. Tradefair section featuring exhibitions in India</p>\n\n<p>Buyer&#39;s Benefits<br />\n1. Free access to all information<br />\n2. Establish direct contact with the manufacturer<br />\n3. Develop multiple sources of supply<br />\n4. Instant inquiries<br />\n5. Free unlimited e-newsletter subscription<br />\n6. Earn reward points with every inquiry and redeem them against exciting gifts.</p>\n\n<p>Your business requires sourcing of products and development of multiple suppliers. JimTrade.com takes your business to new heights by directly connecting you to the manufacturers.</p>\n\n<p>Get the best from the manufacturers in either of the two ways-</p>\n\n<p>1.Post Inquiry and we will do the rest<br />\nClick on the Post Inquiry, enter the product name as well as its description and simply submit it.</p>\n\n<p>JimTrade App&#39;s unique facility makes sure that your inquiries will reach the right suppliers.</p>\n\n<p>JimTrade will search its exhaustive database to identify the most appropriate suppliers matching your inquiries and forward it to them.</p>\n\n<p>&nbsp;</p>\n', 'https://play.google.com/store/apps/details?id=jimtrade.com.jimtrade&hl=en', '1', '2016-05-21 16:17:47'),
(7, 'Artlink Design', 'H71m8WFiAI1463849342Screenshot_20160521-215610_iphone6plus_gold_side1.png', '<p>Established in 2004, ARTLINK DESIGN offer a comprehensive range of interior design and furnishing solutions for residential and commercial spaces. Our innovative design ideas seek to take care of short-term requirements as well as protect long-term investments. We&rsquo;re committed to deliver superior and classy interiors with a judicious blend of the aesthetics and functional aspects.<br />\n<br />\nARTLINK DESIGN consists of a team of highly-skilled and extremely prolific designers and interior space decor professionals who understand that the clients in the contemporary cities of Mumbai &amp; Pune need high-performance, visually compelling as well as highly sustainable residential and commercial interior spaces.</p>\n\n<p>We execute our projects always with new concepts and thoughts. Therefore, for optimum success of your project we ensure that there is regular communication and continuous quality control. As our company grows and evolves we remain dedicated to the quality and design we have been offering our clients for series of years and so majority of our business is by reference and repeat clients.</p>\n', 'https://play.google.com/store/apps/details?id=com.webflyer.artlinkdesign&hl=en', '1', '2016-05-21 16:49:03'),
(6, 'Vasai Birds', '28zlSiZPCn1463848878Screenshot_20160521-215531_iphone6plus_gold_side2.png', '<p>Vasai Birds is an app developed to promote birding and urban biodiversity of the region. This bird mobile app covers 250 common &amp; rare species seen around the Mumbai city. The app has been developed to highlight the rich biodiversity of Vasai region- one of the last green zones left on the outskirts of Mumbai.</p>\n\n<p>The app is targeted towards young students who have easy access to smartphones and tablets than conventional field guides. The idea is to engage students and make locals aware of the rich natural heritage and aid in documentation of local bird fauna of Indian cities. This app aims to help amateur birders and general enthusiasts who at times lack a field guide to refer to upon observing a bird in their surroundings. The app brings bird identification of urban India to fingertips of its users providing an additional tool besides an expert or a field guide.</p>\n\n<p>The app describes 250 common and rare species of birds along with their pictures, calls, common English and scientific names, size, habitat &amp; diet preferences, identification marks and IUCN Red list status.</p>\n', 'https://play.google.com/store/apps/details?id=weltech.com.vasai_virarbirds&hl=en', '1', '2016-05-21 16:41:18'),
(8, 'VMMPL', '3TEdMq7SCi1471103403Screenshot_20160813-104257_nexus5x-portrait.png', '<p>M/s. Vaaishno Maa Metalinks Pvt Ltd (VMMPL) is a one-stop destination, as we are progressive Manufacturers, Exporters and Suppliers of a wide range of products. We are a young venture engaged in domestic and global trading of Aloeve Products, Phytoscience Products, Iron Ore and Greases. We have state-of-the-art manufacturing facility that empowers us to product premium, highly effective and safe Aloe Vera Products. In addition, we are backed by our sister concerns that empower us to source Phytoscience Products, Iron Ore and Greases in bulk and carry out trading across India, China, USA, Malaysia and many more countries. We maintain year round products&rsquo; availability and offer customized packaging solutions. We are a reliable company capable of fulfilling demands of buyers even at short notice.</p>\n', 'https://play.google.com/store/apps/details?id=tech.vmmpl.com.vaaishnomaametalinks&hl=en', '1', '2016-08-13 15:50:03'),
(9, 'Media Konnect', 'HoX5TwIUn41471103552Screenshot_20160813-204729_iphone6plus_gold_side2.png', '<p>MEDIA KONNECT is first global online portal which will provide end to end solution for all film makers across the world irrespective of their country or the language in which they would like to make their film. From script writers to Directors to technicians, every vertical that is required to make a film will be listed in a separate category and will be validated / authenticated by Media Konnect.</p>\n', 'https://play.google.com/store/apps/details?id=com.logicnests.mediakonnect&hl=en', '1', '2016-08-13 15:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `wm_portfolio_images_details`
--

CREATE TABLE `wm_portfolio_images_details` (
  `portfolio_images_id` int(11) NOT NULL,
  `portfolio_id` int(11) DEFAULT NULL,
  `portfolio_image` varchar(5000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wm_portfolio_images_details`
--

INSERT INTO `wm_portfolio_images_details` (`portfolio_images_id`, `portfolio_id`, `portfolio_image`, `user_id`, `upload_date`, `ip`) VALUES
(15, 5, 'DyGrinuo5K14638426401463842640thirteenznexus4zangle1.png', 0, '2016-05-21 14:57:21', '103.226.85.9'),
(14, 5, 'IPKAl5VR4u14638421031463842103four.png', 0, '2016-05-21 14:48:24', '103.226.85.9'),
(13, 5, 'aSgyftn6Lk14638420151463842015six.png', 0, '2016-05-21 14:46:57', '103.226.85.9'),
(85, 4, 'ygNBGtJ8Wx14710748201471074820Screenshotz20160813-131114zsamsung-galaxynote5-white-portrait.png', 0, '2016-08-13 07:53:41', '103.226.85.172'),
(84, 4, 'qGVsRcdOHF14710747941471074794Screenshotz20160813-131036zsamsung-galaxynote5-white-portrait.png', 0, '2016-08-13 07:53:15', '103.226.85.172'),
(90, 1, 'PImRXKnsJx14710758951471075895Screenshotz20160813-132655zhtc-onem8-silver-portrait.png', 0, '2016-08-13 08:11:36', '103.226.85.172'),
(89, 1, 'KRAxZcpyng14710758821471075882Screenshotz20160813-132617zhtc-onem8-silver-portrait.png', 0, '2016-08-13 08:11:23', '103.226.85.172'),
(88, 1, '1Pqpcoxe3D14710758501471075850Screenshotz20160813-132605zhtc-onem8-silver-portrait.png', 0, '2016-08-13 08:10:51', '103.226.85.172'),
(22, 3, 'tu1lrZScEm14638464061463846406Screenshotz20160521-210810zgalaxys4zwhitezportrait.png', 0, '2016-05-21 16:00:07', '103.226.85.9'),
(23, 3, 'wvly9HJpg114638464311463846431Screenshotz20160521-210815zgalaxys4zwhitezportrait.png', 0, '2016-05-21 16:00:31', '103.226.85.9'),
(24, 3, 'FH0iDJ1T8L14638464521463846452Screenshotz20160521-210833zgalaxys4zwhitezportrait.png', 0, '2016-05-21 16:00:52', '103.226.85.9'),
(79, 7, 'lWQmtcTK7d14710725631471072563Screenshotz20160813-123550znexus6p-portrait.png', 0, '2016-08-13 07:16:04', '103.226.85.172'),
(78, 7, 'nQOLCEgl8s14710725321471072532Screenshotz20160813-123546znexus6p-portrait.png', 0, '2016-08-13 07:15:32', '103.226.85.172'),
(76, 7, 'MdWyL1T2tE14710724911471072491Screenshotz20160813-123535znexus6p-portrait.png', 0, '2016-08-13 07:14:52', '103.226.85.172'),
(77, 7, 'Dq6hOktp7d14710725111471072511Screenshotz20160813-123541znexus6p-portrait.png', 0, '2016-08-13 07:15:12', '103.226.85.172'),
(75, 8, 'Oi4kzpBug514710717561471071756Screenshotz20160813-104335znexus5x-portrait.png', 0, '2016-08-13 07:02:37', '103.226.85.172'),
(74, 8, 'G3tBfgV6TH14710716291471071629Screenshotz20160813-104319znexus5x-portrait.png', 0, '2016-08-13 07:00:30', '103.226.85.172'),
(81, 6, 'DmUMO7hlVe14710738831471073883Screenshotz20160813-124944ziphone6pluszspacegreyzside1.png', 0, '2016-08-13 07:38:03', '103.226.85.172'),
(80, 6, 'yGpkPW0S5f14710738431471073843Screenshotz20160813-124959ziphone6pluszspacegreyzportrait.png', 0, '2016-08-13 07:37:24', '103.226.85.172'),
(73, 8, '8SdhIWzV4T14710716131471071613Screenshotz20160813-104313znexus5x-portrait.png', 0, '2016-08-13 07:00:14', '103.226.85.172'),
(72, 8, 'fxUb9Xt18L14710716001471071600Screenshotz20160813-104307znexus5x-portrait.png', 0, '2016-08-13 07:00:01', '103.226.85.172'),
(82, 6, 'JlWskLj9m314710739101471073910Screenshotz20160813-124951ziphone6pluszspacegreyzside2.png', 0, '2016-08-13 07:38:31', '103.226.85.172'),
(83, 6, '8eaP9lWiKh14710739581471073958Screenshotz20160813-124955ziphone6pluszspacegreyzportrait.png', 0, '2016-08-13 07:39:19', '103.226.85.172'),
(86, 4, 'olLsrURN8H14710748561471074856Screenshotz20160813-131126zsamsung-galaxynote5-white-portrait.png', 0, '2016-08-13 07:54:17', '103.226.85.172'),
(87, 4, 'nHXT5i3uwp14710748691471074869Screenshotz20160813-131149zsamsung-galaxynote5-white-portrait.png', 0, '2016-08-13 07:54:30', '103.226.85.172'),
(91, 1, 'RWFDELmgKI14710759141471075914Screenshotz20160813-132702zhtc-onem8-silver-portrait.png', 0, '2016-08-13 08:11:55', '103.226.85.172'),
(92, 1, 'CPUKDOMfXa14710759301471075930Screenshotz20160813-132712zhtc-onem8-silver-portrait.png', 0, '2016-08-13 08:12:11', '103.226.85.172'),
(93, 9, 'oHq6DN9XSF14711036531471103653Screenshotz20160813-204736ziphone6pluszgoldzportrait.png', 0, '2016-08-13 15:54:14', '103.226.85.172'),
(94, 9, 'Rj5TQ1mefd14711039091471103909Screenshotz20160813-204821ziphone6pluszgoldzside2.png', 0, '2016-08-13 15:58:29', '103.226.85.172'),
(95, 9, 'mHWoCp24rD14711039451471103945Screenshotz20160813-204828ziphone6pluszgoldzportrait.png', 0, '2016-08-13 15:59:06', '103.226.85.172'),
(96, 9, 'eFpZCkVEml14711039701471103970Screenshotz20160813-204836ziphone6pluszgoldzside1.png', 0, '2016-08-13 15:59:31', '103.226.85.172');

-- --------------------------------------------------------

--
-- Table structure for table `wm_testimonial_details`
--

CREATE TABLE `wm_testimonial_details` (
  `testimonial_id` int(11) NOT NULL,
  `user_name` varchar(2000) DEFAULT NULL,
  `company_name` varchar(2000) DEFAULT NULL,
  `avatar` varchar(2000) DEFAULT NULL,
  `description` text,
  `status` enum('0','1') DEFAULT '0' COMMENT '1->active, 0->inactive',
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wm_testimonial_details`
--

INSERT INTO `wm_testimonial_details` (`testimonial_id`, `user_name`, `company_name`, `avatar`, `description`, `status`, `upload_date`, `ip`) VALUES
(1, 'Rajesh A Palande', 'Logic nests pvt ltd', 'bGt9jFzPCn14620273982.jpg', '<p>We have worked with Welborn for a while now, and continue to be impressed with his work. He has a great knowledge of the Android platform and design principles. He is also very good at suggesting improvements and refinements to ensure our apps are stable, logical and user-friendly. We will continue to use Welborn for all our future Android projects.</p>\n', '1', '2016-05-03 10:20:00', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wm_about_details`
--
ALTER TABLE `wm_about_details`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `wm_admin_user_details`
--
ALTER TABLE `wm_admin_user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wm_blog_details`
--
ALTER TABLE `wm_blog_details`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `wm_contact_details`
--
ALTER TABLE `wm_contact_details`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `wm_portfolio_details`
--
ALTER TABLE `wm_portfolio_details`
  ADD PRIMARY KEY (`portfolio_id`);

--
-- Indexes for table `wm_portfolio_images_details`
--
ALTER TABLE `wm_portfolio_images_details`
  ADD PRIMARY KEY (`portfolio_images_id`);

--
-- Indexes for table `wm_testimonial_details`
--
ALTER TABLE `wm_testimonial_details`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wm_about_details`
--
ALTER TABLE `wm_about_details`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wm_admin_user_details`
--
ALTER TABLE `wm_admin_user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wm_blog_details`
--
ALTER TABLE `wm_blog_details`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wm_contact_details`
--
ALTER TABLE `wm_contact_details`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wm_portfolio_details`
--
ALTER TABLE `wm_portfolio_details`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wm_portfolio_images_details`
--
ALTER TABLE `wm_portfolio_images_details`
  MODIFY `portfolio_images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `wm_testimonial_details`
--
ALTER TABLE `wm_testimonial_details`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
