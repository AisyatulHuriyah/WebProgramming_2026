# Web Programming 2026-2027

**Stack:** HTML/CSS/JS (front-end) + PHP native + PostgreSQL (back-end)
**Final Project:** Dynamic web application (CRUD + authentication)

---

## 1. Course Information

| Item | Description |
|---|---|
| Course Nameh | Web Programming |
| Credits | 4 credits (theory integrated with practice) |
| Semester | 3 |
| Prerequisites | Algorithms & Basic Programming, Data Structures |
| Field/Program | Business Information Systems |
| Instructor | Milyun Ni'ma Shoumi |
| Learning Model | Project-Based Learning (PjBL) — Outcome Based Education (OBE) |

---

## 2. Graduate Learning Outcomes (GLOs) Assigned to the Course

| Code | Description |
|---|---|
| CPL-S | Demonstrates a responsible attitude and the ability to collaborate in a team to complete tasks in the field of software engineering |
| CPL-P | Masters the theoretical concepts of interface design, client-side and server-side web programming, and relational databases |
| CPL-KU | Able to apply logical, critical, and systematic thinking in designing and implementing web-based solutions |
| CPL-KK | Able to design, build, test, and document functional web applications according to user needs |

---

## 3. Course Learning Outcomes

| Code | CPMK | Domain |
|---|---|---|
| CPMK-1 | Students are able to design the information architecture and user interface (UI/UX) of web applications according to user needs | C6, KK (CPL-KK) |
| CPMK-2 | Students are able to implement responsive static web pages using HTML5 and CSS3 | C3 (CPL-P) |
| CPMK-3 | Students are able to build client-side interactivity using JavaScript (DOM, events, AJAX/fetch) | C3 (CPL-P) |
| CPMK-4 | Students are able to develop dynamic web applications (CRUD, authentication) using PHP and PostgreSQL | C4 (CPL-P, CPL-KK) |
| CPMK-5 | Students are able to integrate front-end and back-end components, test, secure, and deploy web applications | C4/C5 (CPL-KU, CPL-KK) |
| CPMK-6 | Students demonstrate individual and team responsibility in independently completing web application projects | Afektif (CPL-S) |

**Sub-CPMK Map (Learning Outcomes for Each Learning Stage):** See the weekly matrix in Section 5—each Sub-CPMK is a measurable derivative of the CPMK above (the OBE principle of *constructive alignment*).

---

## 4. Brief Description & Course Content

**Description:** This course equips students to design and build end-to-end web applications: from UI/UX design and front-end implementation (HTML/CSS/JS) to dynamic back-end development (PHP + PostgreSQL) with basic authentication and security. Project-Based Learning (PjBL)—each stage of the material is directly applied to a single web application project that is developed incrementally throughout the semester and demonstrated during the final exam.

**Course Content:** UI/UX & wireframing, semantic HTML5, CSS3 & responsive design, JavaScript DOM/events/AJAX, basic to advanced PHP, PostgreSQL & queries, authentication/sessions, basic web security, testing & deployment.

**Reference:**
1. Duckett, J. — *HTML & CSS: Design and Build Websites*
2. Duckett, J. — *JavaScript and JQuery: Interactive Front-End Web Development*
3. Matthew, N. & Stones, R. — *Beginning Databases with PostgreSQL: From Novice to Professional*
4. Nixon, R. — *Learning PHP, MySQL & JavaScript* (use as a general PHP reference, replace the database section with PDO_PGSQL documentation)
5. Official documentation: MDN Web Docs, PHP.net (PDO_PGSQL), PostgreSQL.org, W3C

---

## 5. Final Assessment Components and Weights (OBA Summary)

| Component | Weight | CPMK Mapping |
|---|---|---|
| Weekly Assignments/Practicals (formative) | 30% | CPMK-1, 2, 3, 4 |
| Attitude & Collaboration (logbook) | 4% | CPMK-6 |
| Midterm Exam (individual front-end project) | 15% | CPMK-1, 2, 3 |
| Project Progress & Documentation | 11% | CPMK-4, 5 |
| Final Exam (demo + final application presentation) | 20% | CPMK-4, 5, 6 |
| Final Web Application Product (source code + functionality) | 20% | CPMK-4, 5 |

**Final Course Grade** is calculated based on the contribution of each component toward the achievement of the CPMK, not simply as the average of the scores—in accordance with the OBA principle that assessment must demonstrate that *outcomes* have been achieved, not merely that activities have been completed.
---

## 7. Final Project Evaluation Rubric (Web Application)

| Criterion | Excellent (86–100) | Good (71–85) | Fair (56–70) | Poor (<56) |
|---|---|---|---|---|
| Functionality (CRUD, authentication) | All features work perfectly without bugs | Major features work, minor bugs | Some features work | Major features do not work |
| UI/UX Design | Consistent, responsive, easy to use | Fairly consistent & responsive | Partially responsive | Not responsive/inconsistent |
| Code Quality & Security | Structured, validated, free of basic vulnerabilities | Structured, partially validated | Poorly structured, minimal validation | Unstructured, vulnerable |
| Database (PostgreSQL) | Normal schema (clear ERD), correct data types, efficient & secure queries (prepared statements) | Schema is fairly good, some prepared statements | Schema is suboptimal, queries are prone to injection | Schema does not meet requirements |
| Documentation & Presentation | Comprehensive, clear, answers questions | Fairly comprehensive | Minimal documentation | No documentation |
---

## Session 8 Materials

| Session | Combined Sub-CPMK | Worksheets Used | Core Material | Condensed Material |
|---|---|---|---|---|
| 1 | Semantic HTML5 Structure + Basic CSS3 Styling | worksheet-01 + 02 | Semantic tags, forms, tables + CSS selectors, box model, Flexbox, Grid | Introduction to tools (from Week 1) condensed into a 15-minute opener; not a separate session |
| 2 | Responsive Design + UI/UX Design | worksheet-03 + 04 | Media queries, mobile-first, hamburger menu + wireframes & user flow | Wireframes made more concise (students use templates, not from scratch) |
| 3 | DOM/JS events + AJAX/fetch & JSON | worksheets 05 + 06 | Event handling, client-side validation + fetch API, JSON, async/await | Serves as a front-end assessment |
| 4 | Basic PHP & form handling + PostgreSQL connection | jobsheet-07 + 08 | PHP syntax, superglobals + PDO, ERD, basic queries | Laragon/PostgreSQL installation sessions are recommended as independent assignments before class (flipped learning), not during face-to-face time |
| 5 | CRUD in a project | jobsheet-09 | Edit/delete, prepared statements, pagination & server-side search | Standalone session — CRUD requires a full session, not combined with other topics |
| 6 | Authentication & Sessions + Basic Web Security | worksheets-10 + 11 | Login/register/logout, password hashing + SQLi, XSS, CSRF, session fixation | Intensive — security is discussed while directly working on the newly created auth code, not as a separate session audit |
| 7 | Full front-end/back-end integration | jobsheet-12 | Borrowing/return module, transactions (`BEGIN`/`COMMIT`/`ROLLBACK`) | Peer review progress (formerly Week 14) has been reduced to brief feedback at the end of the session, rather than a dedicated session |
| 8 | Deployment, documentation + **Final Demo (Midterm Exam)** | jobsheet-13 | Separation of configuration/credentials, technical documentation + final product presentation | Deployment & Midterm Exam combined into a single closing session |
| 9–15 | PBL | PBL | PBL | PBL
| 16 | **PBL Demo** | **PBL Demo** | **PBL Demo** | **PBL Demo** |
