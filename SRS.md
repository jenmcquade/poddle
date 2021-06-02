<center> 

# Poddle WordPress Plugin <!-- omit in toc -->

## Software Requirements Specification <!-- omit in toc -->

### v1.0 MVP Release <!-- omit in toc -->

---
### Document Version 1.0.0 <!-- omit in toc -->

Authored By Jen McQuade

jen.k.mcquade@gmail.com

</center>

 ---

- [1.0 Introduction](#10-introduction)
- [1.1 Purpose](#11-purpose)
	- [Key Features](#key-features)
- [1.2 Intended Audience](#12-intended-audience)
	- [This Document](#this-document)
	- [Poddle Wordpress Plugin](#poddle-wordpress-plugin)
- [1.3 Intended Use](#13-intended-use)
	- [This Document](#this-document-1)
	- [Poddle WordPress Plugin](#poddle-wordpress-plugin-1)
- [1.4 Scope](#14-scope)
	- [Objectives](#objectives)
	- [Benefits and Goals](#benefits-and-goals)
- [1.5 Definitions and Acronyms](#15-definitions-and-acronyms)
- [2.0 Overview](#20-overview)
	- [A Brief History](#a-brief-history)
- [2.1 User Needs](#21-user-needs)
	- [Podcast Brands, Content Creators and WordPress Administrators](#podcast-brands-content-creators-and-wordpress-administrators)
	- [Podcast Subscribers, Audiences and Other Website Visitors](#podcast-subscribers-audiences-and-other-website-visitors)
- [2.2 Assumptions and Dependencies](#22-assumptions-and-dependencies)
	- [PHP](#php)
	- [APIs](#apis)
	- [Guzzle for HTTP requests](#guzzle-for-http-requests)
	- [WordPress](#wordpress)
	- [GraphQL](#graphql)
	- [Internationalization and Accessibility](#internationalization-and-accessibility)
- [3.0 Software Requirements](#30-software-requirements)
- [3.1 Functional Requirements](#31-functional-requirements)
	- [3.1.0 Database Design](#310-database-design)
	- [3.1.1 WordPress Plugin Admin Pages](#311-wordpress-plugin-admin-pages)
		- [Front Page Tab](#front-page-tab)
		- [Options Page Tab](#options-page-tab)
	- [3.1.2 Widgets](#312-widgets)
		- [Page and Post Modifiers](#page-and-post-modifiers)
		- [Login With Podchaser](#login-with-podchaser)
		- [Rating For This Episode](#rating-for-this-episode)
		- [Reviews For This Episode](#reviews-for-this-episode)
		- [Rating For This Podcast](#rating-for-this-podcast)
		- [Reviews For This Podcast](#reviews-for-this-podcast)
		- [Post A New Podcast Rating and Review](#post-a-new-podcast-rating-and-review)
		- [Post A New Episode Rating and Review](#post-a-new-episode-rating-and-review)
		- [Bookmark Episode](#bookmark-episode)
		- [Mark Episode as Listened](#mark-episode-as-listened)
		- [Credits For This Episode](#credits-for-this-episode)
		- [Search For Guests](#search-for-guests)
		- [Podcast or Episode Suggestions](#podcast-or-episode-suggestions)
		- [Podcast and Episode Playlists By Podchaser Playlist ID](#podcast-and-episode-playlists-by-podchaser-playlist-id)
	- [3.1.3 Short Code Operations](#313-short-code-operations)
		- [Rating For An Episode](#rating-for-an-episode)
		- [Reviews For An Episode](#reviews-for-an-episode)
		- [Inline Form: Post A New Podcast Rating and Review](#inline-form-post-a-new-podcast-rating-and-review)
		- [Inline Form: Post A New Episode Rating and Review](#inline-form-post-a-new-episode-rating-and-review)
		- [Inline Form: Bookmark An Episode](#inline-form-bookmark-an-episode)
		- [Inline Form: Mark An Episode As Listened](#inline-form-mark-an-episode-as-listened)
		- [Inline Form: Search For Guests](#inline-form-search-for-guests)
		- [Credits For An Episode](#credits-for-an-episode)
		- [Podcast or Episode Suggestions](#podcast-or-episode-suggestions-1)
		- [Podcast and Episode Playlists By Podchaser Playlist ID](#podcast-and-episode-playlists-by-podchaser-playlist-id-1)
	- [3.1.4 Comment Form Modifier For Ratings and Reviews](#314-comment-form-modifier-for-ratings-and-reviews)
	- [3.1.5 Inline Form For Ratings and Reviews](#315-inline-form-for-ratings-and-reviews)
	- [3.1.6 'Creator' Custom Post Type](#316-creator-custom-post-type)
- [3.2 External Interface Requirements](#32-external-interface-requirements)
	- [3.2.1 iTunes API for Reviews](#321-itunes-api-for-reviews)
	- [3.2.2 Podchaser API](#322-podchaser-api)
		- [3.2.2.1 Queries](#3221-queries)
		- [3.2.2.2 Mutations](#3222-mutations)
- [3.3 Features](#33-features)
	- [3.2.1 Podchaser Single Sign On](#321-podchaser-single-sign-on)
	- [3.2.2 Podchaser Ratings and Reviews Reads](#322-podchaser-ratings-and-reviews-reads)
	- [3.2.3 iTunes Podcast Ratings and Reviews Reads](#323-itunes-podcast-ratings-and-reviews-reads)
	- [3.2.4 Podchaser Ratings and Reviews Creation](#324-podchaser-ratings-and-reviews-creation)
	- [3.2.5 Guest and Creator Credits Roster](#325-guest-and-creator-credits-roster)
	- [3.2.6 Show and Episode Playlists By Podchaser Playlist ID](#326-show-and-episode-playlists-by-podchaser-playlist-id)
	- [3.2.7 Podcast and Episode Suggestions](#327-podcast-and-episode-suggestions)
- [3.4 Nonfunctional Requirements](#34-nonfunctional-requirements)
	- [3.4.1 Podchaser Query Costs](#341-podchaser-query-costs)
	- [3.4.2 Performance](#342-performance)
	- [3.4.3 Quality and Code Coverage](#343-quality-and-code-coverage)
	- [3.4.4 Security](#344-security)
- [Revision History](#revision-history)
---

### 1.0 Introduction

Poddle is a WordPress plugin created with the intention of increasing Podcast and Website visitor engagement and retention, by implementing a set of content-driven components from industry Podcast APIs.

The word “poddle” is a British English word meaning “to move or travel in a leisurely manner”.

The Poddle plugin adopts this same free-spirited behavior by enhancing a Podcast brand’s WordPress user interactions beyond the basic functionality of other WordPress plugins and themes, such as frontend audio/video players, Podcast subscriber links, or comments that are only visible on the WordPress platform.

By incorporating more exploratory and interactive features into a brand’s online presence, Poddle is designed to nurture a more direct relationship between Podcast hosts and their audience.

### 1.1 Purpose

Poddle’s purpose is to extend a Podcast’s WordPress site with additional functionality, primarily through the use of custom widgets. This plugin functionality is designed to nurture a more direct relationship between Podcast hosts and their audience.

#### Key Features

<u>Show and Episode Meta Data, Ratings and Reviews</u>

- Integration with Podchaser’s ratings and reviews system, allowing visitors to post to Podchaser using the WordPress comments ecosystem.
- Integration with Apple iTunes API to retrieve and view show ratings and reviews.
- Integration with Podchaser’s credits roster to provide a searchable guest list of the show.

<u>Playlists and Related Episodes</u>

- Hosts can integrate Podchaser show and episode playlists into WordPress posts.
- Curation of a special series, season or taggable attribute.
- Suggest other shows and episodes based on episode content.

<u>Authentication with Podchaser</u>

- Easily create a user base for your WordPress site.
- Allow visitors to bookmark episodes.
- Encourage feedback through show and episode reviews.
- Dashboard analytics on authenticated user interactions.

### 1.2 Intended Audience

#### This Document

- Developer, Jen McQuade
- Podchaser API Management, Marketing and Developer teams
- Open Source developer community
- WordPress Website content creators and administrators
  
> There is no requirement for Apple personnel to review this document or application, because the required software elements of its API are publicly available.

#### Poddle Wordpress Plugin

- Developer, Jen McQuade
- WordPress Website content creators and administrators
- Open Source developer community
- WordPress Website general users (anonymous and authenticated)

### 1.3 Intended Use

#### This Document

- Author and Developer Jen McQuade will use this SRS for requirements documentation and as a source of reference when communicating with other intended audiences.
- Podchaser API Management will have a source of reference when communicating available service architecture and implementation in the Development phase.
- Open Source developer community members will have a reference towards the understanding of the scope and purpose of features of the Poddle WordPress plugin.
- WordPress Website content creators and administrators will have a reference towards the understanding of implementation history, purpose and usefulness of the Poddle WordPress plugin.
- Feedback or modification requests to this document is desired from all intended audiences, via email to jen.k.mcquade@gmail.com

#### Poddle WordPress Plugin

- Developer Jen McQuade’s intention and desired outcome of the release of this software is for employer demonstration purposes and as a WordPress administrator and content creator.
- Podchaser API Management will have a source of demonstration of its resources using the WordPress platform. The software source will be made available on github.com with a GNU Public License.
- Open Source developer community members will have the ability to implement the Poddle WordPress Plugin source code as they see fit under the GNU Public License. The software source will be made available on github.com, open to modification, cloning, branching and redistribution.
- WordPress Website content creators and administrators will have the ability to search for and add the Poddle WordPress Plugin from the WordPress plugin directory. They will be able implement into their Website, a portion or the entirety of features that the Poddle WordPress Plugin provides.
- Users of the plugin will have the ability to submit feedback and support requests through the WordPress plugin support site.
- WordPress site frontend users will have anonymous and authenticated experiences that relate to the WordPress site administrator and content creators’ implementation of the Poddle WordPress Plugin.

### 1.4 Scope

#### Objectives

> Poddle increases audience engagement

Poddle is a WordPress plugin created with the intention of increasing Podcast and Website visitor engagement and retention, by implementing a set of content-driven functionality from industry Podcast APIs.

> Poddle can be managed from the WordPress Admin Interface

The plugin will have features available to WordPress administrators and content creators which meet the goals of this project. These features will be managed through the WordPress Administrator backend.

The plugin will have its own administrative page and custom widgets section. Frontend interfaces for widgets will have a default set of CSS styles and will allow for overrides from user themes.

> Poddle is easy to integrate with existing themes

The plugin will have features available to WordPress frontend users which meet the goals of this project. These features will be comprised of both anonymous and authenticated experiences.

Features of the plugin which have a WordPress frontend component will be made available to the frontend via a set of WordPress widgets, short codes, actions and filters. Implementation of these features will have the ability to be disabled, enabled and modified in the plugin’s Administration page. WordPress users with access to plugin administration, widget and publishing functionalities will be able to modify the effects of the plugin.

> Poddle makes user conversion and authentication easy

Features of the plugin that are implemented in the WordPress frontend and require authentication for personalized experiences will implement the Podchaser API for user creation and authentication.

> Poddle helps track registered audience behavior

WordPress dashboard functionality will be used to report on authenticated user interactions.

> Poddle is the first public WordPress plugin to integrate with Podchaser

OAuth authentication with the Podchaser API will provide the means of querying and presenting dynamic content to the frontend.

#### Benefits and Goals

- Podcast WordPress site owners will have additional means to engage with their audience members.
- Podcast audience members will have additional means to interact with their favorite shows.
- Podchaser will have a demonstratable WordPress implementation of its API, to review with other API clients or Podchaser Pro customers.
- Podchaser and WordPress site owners have the potential for increased user sign-ups, engagement, session time and retention.
- External Podcasts with related content have additional exposure from within the Podcast WordPress site.
- Podcast guests will have more exposure to new audiences when Podcast WordPress sites implement the Podcast Guest features of the Podchaser API.
- WordPress and other Open Source developers will have a collection of functionality that can be used in their own projects.

### 1.5 Definitions and Acronyms

- **Actions**: WordPress hooks for running a function a specific point in the execution of WordPress Core, plugins and themes.
- **Admin**: The WordPress administration backend interface  
- **API**: Application Programming Interface
- **Filters**: WordPress hooks that provide a way for functions to modify data during the execution of WordPress Core, plugins and themes.
- **Hooks**: A way for one piece of code to interact or modify another piece of code at a specific, pre-defined spot.
- **Open Source**: Software with a codebase which is openly accessible to the public
- **PHP**: The development language that powers WordPress
- **Plugin**: A piece of software that extends the codebase of a parent software, thereby providing additional functionality or features
- **Podcast**: A syndicated content stream that uses Really Simple Syndication (RSS) for publishing rich media.
- **WordPress**: An Open Source PHP content management framework

---

### 2.0 Overview

#### A Brief History

Jen McQuade is a Web Developer and producer of the film review Podcast, “Shocked and Applaud”. In the interest of expanding her portfolio of software examples for potential employers, along with her more immediate need to create a branded Web site for the show, she decided to develop a publicly available WordPress plugin which incorporates features she could not find implemented in other publicly available plugins.

After some research, Jen contacted Podchaser.com to discuss her desire to implement their API within the context of a WordPress plugin. Podchaser.com’s API provides several of Jen’s desires for a version 1 release, including a ratings and review system, related content searches, and an authentication provider that could be used to convert anonymous site users into registered subscribers of a Podcast.

The Poddle WordPress plugin’s development is the result of Jen’s desire to further expand the reach of her Podcast and fulfill additional requirements she envisioned for her Podcast's brand.

### 2.1 User Needs

#### Podcast Brands, Content Creators and WordPress Administrators

These are the primary users of the Poddle WordPress plugin. Visitors to WordPress Websites that incorporate the Poddle plugin are secondary users. In the event that the plugin does not meet the needs of these primary ambassadors, it is highly likely the plugin will be discontinued and not receive new features, updates or bug fixes.

With this in mind, it is critical that those who decide to implement this plugin in their hosted environment have access to provide feedback and requests for support, via the WordPress plugin support site. Timely responses from the Developer are also needed in order to maintain satisfactory installation analytics of the plugin.

The desired MVP for the Poddle WordPress plugin must provide availability for its component functionality that is nearly as available as the services it depends on, namely the Apple iTunes and Podchaser APIs.

Because of the external dependencies of the Poddle WordPress plugin, it is also important that the user who implements the plugin is informed if there are errors or sluggish responses to these API calls. This could be done within the Developer Mode (`WP_DEBUG`) notifications of WordPress, within the Admin area, or both.

There are no specific timeliness requirements for responses of the Poddle WordPress plugin, for the requests it makes to external APIs, nor the time to deliver responses to the frontend user.

Consumer satisfaction of the plugin will be based primarily on the installation base of WordPress sites and feedback provided via the WordPress plugin support site.

Feature requests, updates and bug fixes will be considered by the Developer from within the context of the WordPress plugin support site only.

#### Podcast Subscribers, Audiences and Other Website Visitors

Consumers of a Podcast's WordPress presence are secondary users. These users may be subscribers to the Podcast through one or multiple Podcasting applications or RSS feeds, guests of the show who want to learn more about the Podcast's brand, or members of the Press and other Media desiring to engage with the Podcast.

If the Poddle WordPress plugin features have broken implementations or do fulfill the requirements listed in this document, it is highly likely that these visitors to the Podcast's WordPress site will become dissatisfied with their experience. Negative consequences of these visits will impact the Podcast's brand, which in turn may decrease the installation base of the Poddle Plugin.

These plugin consumers should be provided with a user experience that is easy to interact with, understand and navigate. It is the responsibility of the Website administrator or content creator to implement the Poddle plugin's features in a way that are attractive and meaningful within their theme. But, the individual components of the plugin must be easy to implement, presentable and functional for these users, without dependencies on any specific WordPress theme.

The desired outcome of the Poddle plugin's installation in WordPress is an increase in conversion, engagement and retention from these users. These can be measured through the following metrics:

- **Conversions**: Number of conversions to authenticated WordPress users using the Podchaser API's authentication methods
- **Interactions**: Number of Podchaser reviews submitted to Podchaser from the WordPress Website
- **Sessions**: Website session time, where longer sessions might indicate a higher level of engagement
- **Retention**: Authenticated user frequency of visits

### 2.2 Assumptions and Dependencies

#### PHP

The plugin will be developed using PHP 8+. Although a large number of WordPress installations are not yet using PHP 8, PHP 7.4's support will end November 2021. PHP 7.4 is the last release of PHP 7, so PHP 8 and above is the only viable option for long term support.

#### APIs

The plugin will integrate several features from **Podchaser's API**, along with querying the **iTunes API** for ratings and reviews. If either of these APIs are discontinued, or there are large changes in the request format of these services, most, if not all of the plugin's usefulness will be handicapped.

Podchaser's API documentation is available here:

- <https://api-docs.podchaser.com/docs/api/>

The plugin must comply with Podchaser's Terms of Services available here:

- <https://www.podchaser.com/terms.html>

The plugin must comply with Podchaser Attribution Requirements available here:

- <https://www.podchaser.com/terms.html#attribution-requirement>

iTunes API documentation is available here:

- <https://affiliate.itunes.apple.com/resources/documentation/itunes-store-web-service-search-api/>

An example of a PHP iTunes Podcast Ratings scraper is available here:

- <https://gist.github.com/sgmurphy/1878352>

#### Guzzle for HTTP requests

The HTTP PHP library Guzzle will be used to make requests to the APIs. Guzzle will simplify the complexity of HTTP client request code that will be written for consuming these services.

Guzzle's documentation is available here:

- <https://docs.guzzlephp.org/en/stable/>
  
#### WordPress

The plugin will be developed for and valdated using WordPress 5.6 "Simone", which was released December 8th, 2020. As this software project is a WordPress plugin, WordPress core is an obvious dependency. However, there will not be any other plugin or theme dependencies in order to install and use the plugin. The software dependencies such of the plugin, such as Guzzle, will exist within the plugin's installation folder, and will not require additional installation steps.

WordPress's developer documentation is available here:

- <https://developer.wordpress.org/plugins/>

#### GraphQL

Podchaser's API is consumed through a RESTful GraphQL library.

Future versions of the plugin may extend into WordPress's headless processes. Doing so would provide the plugin's functionality in a GraphQL implementation of WordPress. This addition would have support for the WPGraphQL plugin.

GraphQL documentation can be found here:

- <https://graphql.org/learn/>

#### Internationalization and Accessibility

Minimal effort will be taken within the initial release of the plugin to provide i18n or text reader support. Where appropriate, WordPress text domains will be used in formatted output strings, so that others Open Source contributors may provide localization in their language.  Where it is helpful and meaningful for the frontend interface, ARIA labeling will be used in the formatting of HTML.

---

### 3.0 Software Requirements

Software requirements will have responsibilities in the following areas:

- **Functional Requirements**, which are specified here as requirements of the plugin that do not have any external dependencies outside of WordPress.
- **External Interface Requirements** which are specified here as requirements that the plugin has in the consumption of external resources. Specifically, these resources are the **iTunes API** and **Podchaser API**.
- **Features** which are specified here as requirements for the behavior of the plugin's individual components when implemented together.
- **Nonfunctional Requirements** which are specified here as broader quality and security requirements for the plugin.

---

### 3.1 Functional Requirements

---

#### 3.1.0 Database Design

---

#### 3.1.1 WordPress Plugin Admin Pages

##### Front Page Tab

##### Options Page Tab

---

#### 3.1.2 Widgets

##### Page and Post Modifiers

##### Login With Podchaser

##### Rating For This Episode

##### Reviews For This Episode

##### Rating For This Podcast

##### Reviews For This Podcast

##### Post A New Podcast Rating and Review

##### Post A New Episode Rating and Review

##### Bookmark Episode

##### Mark Episode as Listened

##### Credits For This Episode

##### Search For Guests

##### Podcast or Episode Suggestions

##### Podcast and Episode Playlists By Podchaser Playlist ID

---

#### 3.1.3 Short Code Operations

##### Rating For An Episode

##### Reviews For An Episode

##### Inline Form: Post A New Podcast Rating and Review

##### Inline Form: Post A New Episode Rating and Review

##### Inline Form: Bookmark An Episode

##### Inline Form: Mark An Episode As Listened

##### Inline Form: Search For Guests

##### Credits For An Episode

##### Podcast or Episode Suggestions

##### Podcast and Episode Playlists By Podchaser Playlist ID

---

#### 3.1.4 Comment Form Modifier For Ratings and Reviews

---

#### 3.1.5 Inline Form For Ratings and Reviews

---

#### 3.1.6 'Creator' Custom Post Type

---

### 3.2 External Interface Requirements

---

#### 3.2.1 iTunes API for Reviews

#### 3.2.2 Podchaser API

##### 3.2.2.1 Queries

##### 3.2.2.2 Mutations

---

### 3.3 Features

#### 3.2.1 Podchaser Single Sign On

#### 3.2.2 Podchaser Ratings and Reviews Reads

#### 3.2.3 iTunes Podcast Ratings and Reviews Reads

#### 3.2.4 Podchaser Ratings and Reviews Creation

#### 3.2.5 Guest and Creator Credits Roster

#### 3.2.6 Show and Episode Playlists By Podchaser Playlist ID

#### 3.2.7 Podcast and Episode Suggestions

---

### 3.4 Nonfunctional Requirements

#### 3.4.1 Podchaser Query Costs

#### 3.4.2 Performance

#### 3.4.3 Quality and Code Coverage

#### 3.4.4 Security

---

### Revision History
