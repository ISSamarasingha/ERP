@extends('layouts.frontend')

@section('content')

      <!-- About Start -->
      <div id="about" class="container-fluid py-5">
        <div class="container px-lg-5">
          <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
              <div class="section-title position-relative mb-4 pb-2">
                <h6 class="position-relative text-primary ps-4">About Us</h6>
                <h2 class="mt-2">
                  Smart ERP Solutions to Manage and Grow Your Business
                </h2>
              </div>
              <p class="mb-4">
                Our powerful ERP system helps businesses streamline operations
                by integrating finance, inventory, sales, human resources, and
                reporting into one platform. With real-time insights and
                automated workflows, you can improve efficiency, reduce manual
                work, and make better business decisions.
              </p>
              <div class="row g-3">
                <div class="col-sm-6">
                  <h6 class="mb-3">
                    <i class="fa fa-check text-primary me-2"></i>All-in-One
                    Business Management
                  </h6>
                  <h6 class="mb-0">
                    <i class="fa fa-check text-primary me-2"></i>Secure Cloud
                    System
                  </h6>
                </div>
                <div class="col-sm-6">
                  <h6 class="mb-3">
                    <i class="fa fa-check text-primary me-2"></i>Real-Time
                    Analytics
                  </h6>
                  <h6 class="mb-0">
                    <i class="fa fa-check text-primary me-2"></i>24/7 Technical
                    Support
                  </h6>
                </div>
              </div>
              <div class="d-flex align-items-center mt-4">
                <a class="btn btn-primary rounded-pill px-4 me-3" href=""
                  >Learn More</a
                >
                <a class="btn btn-outline-primary btn-square me-3" href=""
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-outline-primary btn-square me-3" href=""
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-outline-primary btn-square me-3" href=""
                  ><i class="fab fa-instagram"></i
                ></a>
                <a class="btn btn-outline-primary btn-square" href=""
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <div class="col-lg-6">
              <img
                class="img-fluid wow zoomIn"
                data-wow-delay="0.5s"
                src="{{ asset('assets/frontend/img/about.jpg') }}"
              />
            </div>
          </div>
        </div>
      </div>
      <!-- About End -->

      <!-- Solutions Start -->
      <div id="solutions" class="container-fluid py-5">
        <div class="container px-lg-5">
          <div
            class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
            data-wow-delay="0.1s"
          >
            <h6 class="position-relative d-inline text-primary ps-4">
              Our Solutions
            </h6>
            <h2 class="mt-2">ERP Solutions We Provide</h2>
          </div>
          <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
              <div
                class="service-item d-flex flex-column justify-content-center text-center rounded"
              >
                <div class="service-icon flex-shrink-0">
                  <i class="fa fa-coins fa-2x"></i>
                </div>
                <h5 class="mb-3">Financial Management</h5>
                <p>
                  Manage accounting, invoices, payments, and financial reports
                  with real-time insights for better decision making.
                </p>
                <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
              <div
                class="service-item d-flex flex-column justify-content-center text-center rounded"
              >
                <div class="service-icon flex-shrink-0">
                  <i class="fa fa-cubes fa-2x"></i>
                </div>
                <h5 class="mb-3">Inventory Management</h5>
                <p>
                  Track stock levels, manage warehouses, and monitor product
                  movement with a centralized inventory system.
                </p>
                <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
              <div
                class="service-item d-flex flex-column justify-content-center text-center rounded"
              >
                <div class="service-icon flex-shrink-0">
                  <i class="fa fa-hand-holding-usd fa-2x"></i>
                </div>
                <h5 class="mb-3">Sales Management</h5>
                <p>
                  Manage quotations, orders, and customer relationships while
                  tracking sales performance in real time.
                </p>
                <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
              <div
                class="service-item d-flex flex-column justify-content-center text-center rounded"
              >
                <div class="service-icon flex-shrink-0">
                  <i class="fa fa-id-badge fa-2x"></i>
                </div>
                <h5 class="mb-3">Human Resource Management</h5>
                <p>
                  Simplify employee management, payroll processing, attendance
                  tracking, and HR reporting in one platform.
                </p>
                <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
              <div
                class="service-item d-flex flex-column justify-content-center text-center rounded"
              >
                <div class="service-icon flex-shrink-0">
                  <i class="fa fa-handshake fa-2x"></i>
                </div>
                <h5 class="mb-3">Procurement Management</h5>
                <p>
                  Manage suppliers, purchase orders, and procurement processes
                  to reduce costs and improve supply chain efficiency.
                </p>
                <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
              <div
                class="service-item d-flex flex-column justify-content-center text-center rounded"
              >
                <div class="service-icon flex-shrink-0">
                  <i class="fa fa-mobile-alt fa-2x"></i>
                </div>
                <h5 class="mb-3">ERP Mobile Access</h5>
                <p>
                  Access business data anytime from mobile devices with secure
                  cloud-based ERP applications.
                </p>
                <a class="btn px-3 mt-auto mx-auto" href="">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Solutions End -->

      <!-- Pricing Plan Start -->
      <div id="pricing" class="container-fluid py-5">
        <div class="container px-lg-5">
          <div
            class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
            data-wow-delay="0.1s"
          >
            <h6 class="position-relative d-inline text-primary ps-4">
              Pricing Plan
            </h6>
            <h2 class="mt-2">Choose The Best ERP Plan For Your Business</h2>
          </div>

          <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
              <div
                class="service-item d-flex flex-column justify-content-center text-center rounded"
              >
                <div class="service-icon flex-shrink-0">
                  <i class="fa fa-user fa-2x"></i>
                </div>

                <h5 class="mb-3">Starter Plan</h5>

                <h2 class="text-primary mb-3">
                  LKR 3500<span class="fs-6">/Month</span>
                </h2>

                <p>Up to 5 Users</p>
                <p>Finance & Sales Module</p>
                <p>Basic Reporting</p>
                <p>Email Support</p>

                <a class="btn btn-primary px-4 mt-auto mx-auto" href="">
                  Get Started
                </a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
              <div
                class="service-item d-flex flex-column justify-content-center text-center rounded"
              >
                <div class="service-icon flex-shrink-0">
                  <i class="fa fa-briefcase fa-2x"></i>
                </div>

                <h5 class="mb-3">Business Plan</h5>

                <h2 class="text-primary mb-3">
                  LKR 7900 <span class="fs-6">/Month</span>
                </h2>

                <p>Up to 20 Users</p>
                <p>Finance, Sales & Inventory</p>
                <p>Advanced Reports</p>
                <p>Priority Support</p>

                <a class="btn btn-primary px-4 mt-auto mx-auto" href="">
                  Get Started
                </a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
              <div
                class="service-item d-flex flex-column justify-content-center text-center rounded"
              >
                <div class="service-icon flex-shrink-0">
                  <i class="fa fa-crown fa-2x"></i>
                </div>

                <h5 class="mb-3">Enterprise Plan</h5>

                <h2 class="text-primary mb-3">
                  LKR 13900 <span class="fs-6">/Month</span>
                </h2>

                <p>Unlimited Users</p>
                <p>All ERP Modules</p>
                <p>Custom Integrations</p>
                <p>24/7 Dedicated Support</p>

                <a class="btn btn-primary px-4 mt-auto mx-auto" href="">
                  Contact Sales
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pricing Plan End -->

      <!-- Contact Start -->
      <div id="contact" class="container-fluid py-5">
        <div class="container px-lg-5">
          <div class="row justify-content-center">
            <div class="col-lg-7">
              <div
                class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
                data-wow-delay="0.1s"
              >
                <h6 class="position-relative d-inline text-primary ps-4">
                  Contact Us
                </h6>
                <h2 class="mt-2">Contact For Any Query</h2>
              </div>
              <div class="wow fadeInUp" data-wow-delay="0.3s">
                <h4 class="text-center mb-4">
                  Have questions about our ERP solutions? Get in touch with our
                  team and discover how our platform can streamline your
                  business operations.
                </h4>
                <form>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          placeholder="Your Name"
                        />
                        <label for="name">Your Name</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          placeholder="Your Email"
                        />
                        <label for="email">Your Email</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="subject"
                          placeholder="Subject"
                        />
                        <label for="subject">Subject</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating">
                        <textarea
                          class="form-control"
                          placeholder="Leave a message here"
                          id="message"
                          style="height: 150px"
                        ></textarea>
                        <label for="message">Message</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100 py-3" type="submit">
                        Send Message
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Contact End -->

@endsection