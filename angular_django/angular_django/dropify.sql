PGDMP     2            	        y            dropify    12.5    13.1 �                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            !           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            "           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            #           1262    16788    dropify    DATABASE     �   CREATE DATABASE dropify WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Korean (DPRK)_Democratic People''s Republic of Korea.950';
    DROP DATABASE dropify;
                postgres    false            �            1259    16994    api_product    TABLE     .  CREATE TABLE public.api_product (
    id integer NOT NULL,
    name character varying(400) NOT NULL,
    description text NOT NULL,
    image text NOT NULL,
    is_active boolean NOT NULL,
    company_id integer NOT NULL,
    price double precision NOT NULL,
    sku character varying(400) NOT NULL
);
    DROP TABLE public.api_product;
       public         heap    postgres    false            �            1259    16992    api_product_id_seq    SEQUENCE     �   CREATE SEQUENCE public.api_product_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.api_product_id_seq;
       public          postgres    false    227            $           0    0    api_product_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.api_product_id_seq OWNED BY public.api_product.id;
          public          postgres    false    226            �            1259    17005    api_variation    TABLE     �  CREATE TABLE public.api_variation (
    id integer NOT NULL,
    title character varying(400) NOT NULL,
    sku character varying(400) NOT NULL,
    image character varying(400) NOT NULL,
    price character varying(400) NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone NOT NULL,
    product_id integer NOT NULL,
    barcode character varying(400) NOT NULL
);
 !   DROP TABLE public.api_variation;
       public         heap    postgres    false            �            1259    17003    api_variation_id_seq    SEQUENCE     �   CREATE SEQUENCE public.api_variation_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.api_variation_id_seq;
       public          postgres    false    229            %           0    0    api_variation_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.api_variation_id_seq OWNED BY public.api_variation.id;
          public          postgres    false    228            �            1259    17016    api_variationtype    TABLE     �   CREATE TABLE public.api_variationtype (
    id integer NOT NULL,
    type character varying(400) NOT NULL,
    product_id integer NOT NULL
);
 %   DROP TABLE public.api_variationtype;
       public         heap    postgres    false            �            1259    17014    api_variationtype_id_seq    SEQUENCE     �   CREATE SEQUENCE public.api_variationtype_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.api_variationtype_id_seq;
       public          postgres    false    231            &           0    0    api_variationtype_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.api_variationtype_id_seq OWNED BY public.api_variationtype.id;
          public          postgres    false    230            �            1259    17024    api_variationtypeattribute    TABLE     �   CREATE TABLE public.api_variationtypeattribute (
    id integer NOT NULL,
    attribute character varying(400) NOT NULL,
    variation_type_id integer NOT NULL
);
 .   DROP TABLE public.api_variationtypeattribute;
       public         heap    postgres    false            �            1259    17022 !   api_variationtypeattribute_id_seq    SEQUENCE     �   CREATE SEQUENCE public.api_variationtypeattribute_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.api_variationtypeattribute_id_seq;
       public          postgres    false    233            '           0    0 !   api_variationtypeattribute_id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.api_variationtypeattribute_id_seq OWNED BY public.api_variationtypeattribute.id;
          public          postgres    false    232            �            1259    16820 
   auth_group    TABLE     e   CREATE TABLE public.auth_group (
    id integer NOT NULL,
    name character varying(80) NOT NULL
);
    DROP TABLE public.auth_group;
       public         heap    postgres    false            �            1259    16818    auth_group_id_seq    SEQUENCE     �   CREATE SEQUENCE public.auth_group_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.auth_group_id_seq;
       public          postgres    false    209            (           0    0    auth_group_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.auth_group_id_seq OWNED BY public.auth_group.id;
          public          postgres    false    208            �            1259    16830    auth_group_permissions    TABLE     �   CREATE TABLE public.auth_group_permissions (
    id integer NOT NULL,
    group_id integer NOT NULL,
    permission_id integer NOT NULL
);
 *   DROP TABLE public.auth_group_permissions;
       public         heap    postgres    false            �            1259    16828    auth_group_permissions_id_seq    SEQUENCE     �   CREATE SEQUENCE public.auth_group_permissions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.auth_group_permissions_id_seq;
       public          postgres    false    211            )           0    0    auth_group_permissions_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.auth_group_permissions_id_seq OWNED BY public.auth_group_permissions.id;
          public          postgres    false    210            �            1259    16812    auth_permission    TABLE     �   CREATE TABLE public.auth_permission (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    content_type_id integer NOT NULL,
    codename character varying(100) NOT NULL
);
 #   DROP TABLE public.auth_permission;
       public         heap    postgres    false            �            1259    16810    auth_permission_id_seq    SEQUENCE     �   CREATE SEQUENCE public.auth_permission_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.auth_permission_id_seq;
       public          postgres    false    207            *           0    0    auth_permission_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.auth_permission_id_seq OWNED BY public.auth_permission.id;
          public          postgres    false    206            �            1259    16861 	   auth_user    TABLE     _  CREATE TABLE public.auth_user (
    id integer NOT NULL,
    last_login timestamp with time zone,
    is_superuser boolean NOT NULL,
    first_name character varying(30) NOT NULL,
    last_name character varying(150) NOT NULL,
    is_staff boolean NOT NULL,
    date_joined timestamp with time zone NOT NULL,
    email character varying(254) NOT NULL,
    password character varying(400) NOT NULL,
    phone character varying(400) NOT NULL,
    country character varying(400) NOT NULL,
    city character varying(400) NOT NULL,
    address character varying(400) NOT NULL,
    is_active boolean NOT NULL
);
    DROP TABLE public.auth_user;
       public         heap    postgres    false            �            1259    16876    auth_user_groups    TABLE        CREATE TABLE public.auth_user_groups (
    id integer NOT NULL,
    user_id integer NOT NULL,
    group_id integer NOT NULL
);
 $   DROP TABLE public.auth_user_groups;
       public         heap    postgres    false            �            1259    16874    auth_user_groups_id_seq    SEQUENCE     �   CREATE SEQUENCE public.auth_user_groups_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.auth_user_groups_id_seq;
       public          postgres    false    215            +           0    0    auth_user_groups_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.auth_user_groups_id_seq OWNED BY public.auth_user_groups.id;
          public          postgres    false    214            �            1259    16859    auth_user_id_seq    SEQUENCE     �   CREATE SEQUENCE public.auth_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.auth_user_id_seq;
       public          postgres    false    213            ,           0    0    auth_user_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.auth_user_id_seq OWNED BY public.auth_user.id;
          public          postgres    false    212            �            1259    16884    auth_user_user_permissions    TABLE     �   CREATE TABLE public.auth_user_user_permissions (
    id integer NOT NULL,
    user_id integer NOT NULL,
    permission_id integer NOT NULL
);
 .   DROP TABLE public.auth_user_user_permissions;
       public         heap    postgres    false            �            1259    16882 !   auth_user_user_permissions_id_seq    SEQUENCE     �   CREATE SEQUENCE public.auth_user_user_permissions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.auth_user_user_permissions_id_seq;
       public          postgres    false    217            -           0    0 !   auth_user_user_permissions_id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.auth_user_user_permissions_id_seq OWNED BY public.auth_user_user_permissions.id;
          public          postgres    false    216            �            1259    17120    authtoken_token    TABLE     �   CREATE TABLE public.authtoken_token (
    key character varying(40) NOT NULL,
    created timestamp with time zone NOT NULL,
    user_id integer NOT NULL
);
 #   DROP TABLE public.authtoken_token;
       public         heap    postgres    false            �            1259    16946    company    TABLE     c   CREATE TABLE public.company (
    id integer NOT NULL,
    name character varying(400) NOT NULL
);
    DROP TABLE public.company;
       public         heap    postgres    false            �            1259    16944    company_id_seq    SEQUENCE     �   CREATE SEQUENCE public.company_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.company_id_seq;
       public          postgres    false    221            .           0    0    company_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.company_id_seq OWNED BY public.company.id;
          public          postgres    false    220            �            1259    16961    company_stuff    TABLE     �   CREATE TABLE public.company_stuff (
    id integer NOT NULL,
    company_id integer NOT NULL,
    stuff_id integer NOT NULL,
    role integer NOT NULL
);
 !   DROP TABLE public.company_stuff;
       public         heap    postgres    false            �            1259    16959    company_stuff_id_seq    SEQUENCE     �   CREATE SEQUENCE public.company_stuff_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.company_stuff_id_seq;
       public          postgres    false    223            /           0    0    company_stuff_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.company_stuff_id_seq OWNED BY public.company_stuff.id;
          public          postgres    false    222            �            1259    16981    customer    TABLE     m  CREATE TABLE public.customer (
    id integer NOT NULL,
    first_name character varying(400) NOT NULL,
    last_name character varying(400) NOT NULL,
    email character varying(254) NOT NULL,
    company character varying(400) NOT NULL,
    phone character varying(400) NOT NULL,
    apartment character varying(400) NOT NULL,
    city character varying(400) NOT NULL,
    country character varying(400) NOT NULL,
    region character varying(400) NOT NULL,
    postal_code character varying(400) NOT NULL,
    address character varying(400) NOT NULL,
    image character varying(400) NOT NULL,
    owner_id integer
);
    DROP TABLE public.customer;
       public         heap    postgres    false            �            1259    16979    customer_id_seq    SEQUENCE     �   CREATE SEQUENCE public.customer_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.customer_id_seq;
       public          postgres    false    225            0           0    0    customer_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.customer_id_seq OWNED BY public.customer.id;
          public          postgres    false    224            �            1259    16922    django_admin_log    TABLE     �  CREATE TABLE public.django_admin_log (
    id integer NOT NULL,
    action_time timestamp with time zone NOT NULL,
    object_id text,
    object_repr character varying(200) NOT NULL,
    action_flag smallint NOT NULL,
    change_message text NOT NULL,
    content_type_id integer,
    user_id integer NOT NULL,
    CONSTRAINT django_admin_log_action_flag_check CHECK ((action_flag >= 0))
);
 $   DROP TABLE public.django_admin_log;
       public         heap    postgres    false            �            1259    16920    django_admin_log_id_seq    SEQUENCE     �   CREATE SEQUENCE public.django_admin_log_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.django_admin_log_id_seq;
       public          postgres    false    219            1           0    0    django_admin_log_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.django_admin_log_id_seq OWNED BY public.django_admin_log.id;
          public          postgres    false    218            �            1259    16802    django_content_type    TABLE     �   CREATE TABLE public.django_content_type (
    id integer NOT NULL,
    app_label character varying(100) NOT NULL,
    model character varying(100) NOT NULL
);
 '   DROP TABLE public.django_content_type;
       public         heap    postgres    false            �            1259    16800    django_content_type_id_seq    SEQUENCE     �   CREATE SEQUENCE public.django_content_type_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.django_content_type_id_seq;
       public          postgres    false    205            2           0    0    django_content_type_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.django_content_type_id_seq OWNED BY public.django_content_type.id;
          public          postgres    false    204            �            1259    16791    django_migrations    TABLE     �   CREATE TABLE public.django_migrations (
    id integer NOT NULL,
    app character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    applied timestamp with time zone NOT NULL
);
 %   DROP TABLE public.django_migrations;
       public         heap    postgres    false            �            1259    16789    django_migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.django_migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.django_migrations_id_seq;
       public          postgres    false    203            3           0    0    django_migrations_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.django_migrations_id_seq OWNED BY public.django_migrations.id;
          public          postgres    false    202            �            1259    17171    django_session    TABLE     �   CREATE TABLE public.django_session (
    session_key character varying(40) NOT NULL,
    session_data text NOT NULL,
    expire_date timestamp with time zone NOT NULL
);
 "   DROP TABLE public.django_session;
       public         heap    postgres    false            �            1259    17140    fcm_django_fcmdevice    TABLE     6  CREATE TABLE public.fcm_django_fcmdevice (
    id integer NOT NULL,
    name character varying(255),
    active boolean NOT NULL,
    date_created timestamp with time zone,
    device_id character varying(150),
    registration_id text NOT NULL,
    type character varying(10) NOT NULL,
    user_id integer
);
 (   DROP TABLE public.fcm_django_fcmdevice;
       public         heap    postgres    false            �            1259    17138    fcm_django_fcmdevice_id_seq    SEQUENCE     �   CREATE SEQUENCE public.fcm_django_fcmdevice_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.fcm_django_fcmdevice_id_seq;
       public          postgres    false    240            4           0    0    fcm_django_fcmdevice_id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.fcm_django_fcmdevice_id_seq OWNED BY public.fcm_django_fcmdevice.id;
          public          postgres    false    239            �            1259    17093    history    TABLE     K  CREATE TABLE public.history (
    id integer NOT NULL,
    ip_address character varying(400) NOT NULL,
    browser_info character varying(400) NOT NULL,
    location character varying(400) NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone NOT NULL,
    user_id integer NOT NULL
);
    DROP TABLE public.history;
       public         heap    postgres    false            �            1259    17091    history_id_seq    SEQUENCE     �   CREATE SEQUENCE public.history_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.history_id_seq;
       public          postgres    false    237            5           0    0    history_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.history_id_seq OWNED BY public.history.id;
          public          postgres    false    236            �            1259    17076    order    TABLE     �  CREATE TABLE public."order" (
    id integer NOT NULL,
    products integer[] NOT NULL,
    owner integer NOT NULL,
    total_price double precision NOT NULL,
    total_tax double precision NOT NULL,
    payment integer NOT NULL,
    fulfillment integer NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone NOT NULL,
    customer_id integer NOT NULL,
    amounts integer[] NOT NULL
);
    DROP TABLE public."order";
       public         heap    postgres    false            �            1259    17074    order_id_seq    SEQUENCE     �   CREATE SEQUENCE public.order_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.order_id_seq;
       public          postgres    false    235            6           0    0    order_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.order_id_seq OWNED BY public."order".id;
          public          postgres    false    234            
           2604    16997    api_product id    DEFAULT     p   ALTER TABLE ONLY public.api_product ALTER COLUMN id SET DEFAULT nextval('public.api_product_id_seq'::regclass);
 =   ALTER TABLE public.api_product ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    226    227                       2604    17008    api_variation id    DEFAULT     t   ALTER TABLE ONLY public.api_variation ALTER COLUMN id SET DEFAULT nextval('public.api_variation_id_seq'::regclass);
 ?   ALTER TABLE public.api_variation ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    229    229                       2604    17019    api_variationtype id    DEFAULT     |   ALTER TABLE ONLY public.api_variationtype ALTER COLUMN id SET DEFAULT nextval('public.api_variationtype_id_seq'::regclass);
 C   ALTER TABLE public.api_variationtype ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    231    230    231                       2604    17027    api_variationtypeattribute id    DEFAULT     �   ALTER TABLE ONLY public.api_variationtypeattribute ALTER COLUMN id SET DEFAULT nextval('public.api_variationtypeattribute_id_seq'::regclass);
 L   ALTER TABLE public.api_variationtypeattribute ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    233    232    233                        2604    16823    auth_group id    DEFAULT     n   ALTER TABLE ONLY public.auth_group ALTER COLUMN id SET DEFAULT nextval('public.auth_group_id_seq'::regclass);
 <   ALTER TABLE public.auth_group ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    209    208    209                       2604    16833    auth_group_permissions id    DEFAULT     �   ALTER TABLE ONLY public.auth_group_permissions ALTER COLUMN id SET DEFAULT nextval('public.auth_group_permissions_id_seq'::regclass);
 H   ALTER TABLE public.auth_group_permissions ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    211    211            �
           2604    16815    auth_permission id    DEFAULT     x   ALTER TABLE ONLY public.auth_permission ALTER COLUMN id SET DEFAULT nextval('public.auth_permission_id_seq'::regclass);
 A   ALTER TABLE public.auth_permission ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    207    206    207                       2604    16864    auth_user id    DEFAULT     l   ALTER TABLE ONLY public.auth_user ALTER COLUMN id SET DEFAULT nextval('public.auth_user_id_seq'::regclass);
 ;   ALTER TABLE public.auth_user ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    212    213    213                       2604    16879    auth_user_groups id    DEFAULT     z   ALTER TABLE ONLY public.auth_user_groups ALTER COLUMN id SET DEFAULT nextval('public.auth_user_groups_id_seq'::regclass);
 B   ALTER TABLE public.auth_user_groups ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214    215                       2604    16887    auth_user_user_permissions id    DEFAULT     �   ALTER TABLE ONLY public.auth_user_user_permissions ALTER COLUMN id SET DEFAULT nextval('public.auth_user_user_permissions_id_seq'::regclass);
 L   ALTER TABLE public.auth_user_user_permissions ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    217    217                       2604    16949 
   company id    DEFAULT     h   ALTER TABLE ONLY public.company ALTER COLUMN id SET DEFAULT nextval('public.company_id_seq'::regclass);
 9   ALTER TABLE public.company ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220    221                       2604    16964    company_stuff id    DEFAULT     t   ALTER TABLE ONLY public.company_stuff ALTER COLUMN id SET DEFAULT nextval('public.company_stuff_id_seq'::regclass);
 ?   ALTER TABLE public.company_stuff ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    223    223            	           2604    16984    customer id    DEFAULT     j   ALTER TABLE ONLY public.customer ALTER COLUMN id SET DEFAULT nextval('public.customer_id_seq'::regclass);
 :   ALTER TABLE public.customer ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224    225                       2604    16925    django_admin_log id    DEFAULT     z   ALTER TABLE ONLY public.django_admin_log ALTER COLUMN id SET DEFAULT nextval('public.django_admin_log_id_seq'::regclass);
 B   ALTER TABLE public.django_admin_log ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    219    219            �
           2604    16805    django_content_type id    DEFAULT     �   ALTER TABLE ONLY public.django_content_type ALTER COLUMN id SET DEFAULT nextval('public.django_content_type_id_seq'::regclass);
 E   ALTER TABLE public.django_content_type ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    204    205    205            �
           2604    16794    django_migrations id    DEFAULT     |   ALTER TABLE ONLY public.django_migrations ALTER COLUMN id SET DEFAULT nextval('public.django_migrations_id_seq'::regclass);
 C   ALTER TABLE public.django_migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    203    202    203                       2604    17143    fcm_django_fcmdevice id    DEFAULT     �   ALTER TABLE ONLY public.fcm_django_fcmdevice ALTER COLUMN id SET DEFAULT nextval('public.fcm_django_fcmdevice_id_seq'::regclass);
 F   ALTER TABLE public.fcm_django_fcmdevice ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    240    239    240                       2604    17096 
   history id    DEFAULT     h   ALTER TABLE ONLY public.history ALTER COLUMN id SET DEFAULT nextval('public.history_id_seq'::regclass);
 9   ALTER TABLE public.history ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    237    236    237                       2604    17079    order id    DEFAULT     f   ALTER TABLE ONLY public."order" ALTER COLUMN id SET DEFAULT nextval('public.order_id_seq'::regclass);
 9   ALTER TABLE public."order" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    234    235    235                      0    16994    api_product 
   TABLE DATA           f   COPY public.api_product (id, name, description, image, is_active, company_id, price, sku) FROM stdin;
    public          postgres    false    227   �                0    17005    api_variation 
   TABLE DATA           r   COPY public.api_variation (id, title, sku, image, price, created_at, updated_at, product_id, barcode) FROM stdin;
    public          postgres    false    229   O                0    17016    api_variationtype 
   TABLE DATA           A   COPY public.api_variationtype (id, type, product_id) FROM stdin;
    public          postgres    false    231   l                0    17024    api_variationtypeattribute 
   TABLE DATA           V   COPY public.api_variationtypeattribute (id, attribute, variation_type_id) FROM stdin;
    public          postgres    false    233   �      �          0    16820 
   auth_group 
   TABLE DATA           .   COPY public.auth_group (id, name) FROM stdin;
    public          postgres    false    209   �      �          0    16830    auth_group_permissions 
   TABLE DATA           M   COPY public.auth_group_permissions (id, group_id, permission_id) FROM stdin;
    public          postgres    false    211   �      �          0    16812    auth_permission 
   TABLE DATA           N   COPY public.auth_permission (id, name, content_type_id, codename) FROM stdin;
    public          postgres    false    207   �                0    16861 	   auth_user 
   TABLE DATA           �   COPY public.auth_user (id, last_login, is_superuser, first_name, last_name, is_staff, date_joined, email, password, phone, country, city, address, is_active) FROM stdin;
    public          postgres    false    213   �                0    16876    auth_user_groups 
   TABLE DATA           A   COPY public.auth_user_groups (id, user_id, group_id) FROM stdin;
    public          postgres    false    215   �                0    16884    auth_user_user_permissions 
   TABLE DATA           P   COPY public.auth_user_user_permissions (id, user_id, permission_id) FROM stdin;
    public          postgres    false    217   �                0    17120    authtoken_token 
   TABLE DATA           @   COPY public.authtoken_token (key, created, user_id) FROM stdin;
    public          postgres    false    238   �      	          0    16946    company 
   TABLE DATA           +   COPY public.company (id, name) FROM stdin;
    public          postgres    false    221   
                0    16961    company_stuff 
   TABLE DATA           G   COPY public.company_stuff (id, company_id, stuff_id, role) FROM stdin;
    public          postgres    false    223   3                0    16981    customer 
   TABLE DATA           �   COPY public.customer (id, first_name, last_name, email, company, phone, apartment, city, country, region, postal_code, address, image, owner_id) FROM stdin;
    public          postgres    false    225   X                0    16922    django_admin_log 
   TABLE DATA           �   COPY public.django_admin_log (id, action_time, object_id, object_repr, action_flag, change_message, content_type_id, user_id) FROM stdin;
    public          postgres    false    219   4	      �          0    16802    django_content_type 
   TABLE DATA           C   COPY public.django_content_type (id, app_label, model) FROM stdin;
    public          postgres    false    205   Q	      �          0    16791    django_migrations 
   TABLE DATA           C   COPY public.django_migrations (id, app, name, applied) FROM stdin;
    public          postgres    false    203   
                0    17171    django_session 
   TABLE DATA           P   COPY public.django_session (session_key, session_data, expire_date) FROM stdin;
    public          postgres    false    241                   0    17140    fcm_django_fcmdevice 
   TABLE DATA           y   COPY public.fcm_django_fcmdevice (id, name, active, date_created, device_id, registration_id, type, user_id) FROM stdin;
    public          postgres    false    240   <                0    17093    history 
   TABLE DATA           j   COPY public.history (id, ip_address, browser_info, location, created_at, updated_at, user_id) FROM stdin;
    public          postgres    false    237   Y                0    17076    order 
   TABLE DATA           �   COPY public."order" (id, products, owner, total_price, total_tax, payment, fulfillment, created_at, updated_at, customer_id, amounts) FROM stdin;
    public          postgres    false    235   �      7           0    0    api_product_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.api_product_id_seq', 3, true);
          public          postgres    false    226            8           0    0    api_variation_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.api_variation_id_seq', 1, false);
          public          postgres    false    228            9           0    0    api_variationtype_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.api_variationtype_id_seq', 3, true);
          public          postgres    false    230            :           0    0 !   api_variationtypeattribute_id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.api_variationtypeattribute_id_seq', 1, false);
          public          postgres    false    232            ;           0    0    auth_group_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.auth_group_id_seq', 1, false);
          public          postgres    false    208            <           0    0    auth_group_permissions_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.auth_group_permissions_id_seq', 1, false);
          public          postgres    false    210            =           0    0    auth_permission_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.auth_permission_id_seq', 68, true);
          public          postgres    false    206            >           0    0    auth_user_groups_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.auth_user_groups_id_seq', 1, false);
          public          postgres    false    214            ?           0    0    auth_user_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.auth_user_id_seq', 2, true);
          public          postgres    false    212            @           0    0 !   auth_user_user_permissions_id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.auth_user_user_permissions_id_seq', 1, false);
          public          postgres    false    216            A           0    0    company_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.company_id_seq', 1, true);
          public          postgres    false    220            B           0    0    company_stuff_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.company_stuff_id_seq', 1, true);
          public          postgres    false    222            C           0    0    customer_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.customer_id_seq', 2, true);
          public          postgres    false    224            D           0    0    django_admin_log_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.django_admin_log_id_seq', 1, false);
          public          postgres    false    218            E           0    0    django_content_type_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.django_content_type_id_seq', 17, true);
          public          postgres    false    204            F           0    0    django_migrations_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.django_migrations_id_seq', 38, true);
          public          postgres    false    202            G           0    0    fcm_django_fcmdevice_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.fcm_django_fcmdevice_id_seq', 1, false);
          public          postgres    false    239            H           0    0    history_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.history_id_seq', 1, true);
          public          postgres    false    236            I           0    0    order_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.order_id_seq', 1, false);
          public          postgres    false    234            G           2606    17002    api_product api_product_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.api_product
    ADD CONSTRAINT api_product_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.api_product DROP CONSTRAINT api_product_pkey;
       public            postgres    false    227            I           2606    17013     api_variation api_variation_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.api_variation
    ADD CONSTRAINT api_variation_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.api_variation DROP CONSTRAINT api_variation_pkey;
       public            postgres    false    229            L           2606    17021 (   api_variationtype api_variationtype_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.api_variationtype
    ADD CONSTRAINT api_variationtype_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.api_variationtype DROP CONSTRAINT api_variationtype_pkey;
       public            postgres    false    231            O           2606    17029 :   api_variationtypeattribute api_variationtypeattribute_pkey 
   CONSTRAINT     x   ALTER TABLE ONLY public.api_variationtypeattribute
    ADD CONSTRAINT api_variationtypeattribute_pkey PRIMARY KEY (id);
 d   ALTER TABLE ONLY public.api_variationtypeattribute DROP CONSTRAINT api_variationtypeattribute_pkey;
       public            postgres    false    233                       2606    16827    auth_group auth_group_name_key 
   CONSTRAINT     Y   ALTER TABLE ONLY public.auth_group
    ADD CONSTRAINT auth_group_name_key UNIQUE (name);
 H   ALTER TABLE ONLY public.auth_group DROP CONSTRAINT auth_group_name_key;
       public            postgres    false    209            #           2606    16856 R   auth_group_permissions auth_group_permissions_group_id_permission_id_0cd325b0_uniq 
   CONSTRAINT     �   ALTER TABLE ONLY public.auth_group_permissions
    ADD CONSTRAINT auth_group_permissions_group_id_permission_id_0cd325b0_uniq UNIQUE (group_id, permission_id);
 |   ALTER TABLE ONLY public.auth_group_permissions DROP CONSTRAINT auth_group_permissions_group_id_permission_id_0cd325b0_uniq;
       public            postgres    false    211    211            &           2606    16835 2   auth_group_permissions auth_group_permissions_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.auth_group_permissions
    ADD CONSTRAINT auth_group_permissions_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.auth_group_permissions DROP CONSTRAINT auth_group_permissions_pkey;
       public            postgres    false    211                        2606    16825    auth_group auth_group_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.auth_group
    ADD CONSTRAINT auth_group_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.auth_group DROP CONSTRAINT auth_group_pkey;
       public            postgres    false    209                       2606    16842 F   auth_permission auth_permission_content_type_id_codename_01ab375a_uniq 
   CONSTRAINT     �   ALTER TABLE ONLY public.auth_permission
    ADD CONSTRAINT auth_permission_content_type_id_codename_01ab375a_uniq UNIQUE (content_type_id, codename);
 p   ALTER TABLE ONLY public.auth_permission DROP CONSTRAINT auth_permission_content_type_id_codename_01ab375a_uniq;
       public            postgres    false    207    207                       2606    16817 $   auth_permission auth_permission_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.auth_permission
    ADD CONSTRAINT auth_permission_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.auth_permission DROP CONSTRAINT auth_permission_pkey;
       public            postgres    false    207            )           2606    16871    auth_user auth_user_email_key 
   CONSTRAINT     Y   ALTER TABLE ONLY public.auth_user
    ADD CONSTRAINT auth_user_email_key UNIQUE (email);
 G   ALTER TABLE ONLY public.auth_user DROP CONSTRAINT auth_user_email_key;
       public            postgres    false    213            .           2606    16881 &   auth_user_groups auth_user_groups_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.auth_user_groups
    ADD CONSTRAINT auth_user_groups_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.auth_user_groups DROP CONSTRAINT auth_user_groups_pkey;
       public            postgres    false    215            1           2606    16903 @   auth_user_groups auth_user_groups_user_id_group_id_94350c0c_uniq 
   CONSTRAINT     �   ALTER TABLE ONLY public.auth_user_groups
    ADD CONSTRAINT auth_user_groups_user_id_group_id_94350c0c_uniq UNIQUE (user_id, group_id);
 j   ALTER TABLE ONLY public.auth_user_groups DROP CONSTRAINT auth_user_groups_user_id_group_id_94350c0c_uniq;
       public            postgres    false    215    215            +           2606    16869    auth_user auth_user_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.auth_user
    ADD CONSTRAINT auth_user_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.auth_user DROP CONSTRAINT auth_user_pkey;
       public            postgres    false    213            4           2606    16889 :   auth_user_user_permissions auth_user_user_permissions_pkey 
   CONSTRAINT     x   ALTER TABLE ONLY public.auth_user_user_permissions
    ADD CONSTRAINT auth_user_user_permissions_pkey PRIMARY KEY (id);
 d   ALTER TABLE ONLY public.auth_user_user_permissions DROP CONSTRAINT auth_user_user_permissions_pkey;
       public            postgres    false    217            7           2606    16917 Y   auth_user_user_permissions auth_user_user_permissions_user_id_permission_id_14a6b632_uniq 
   CONSTRAINT     �   ALTER TABLE ONLY public.auth_user_user_permissions
    ADD CONSTRAINT auth_user_user_permissions_user_id_permission_id_14a6b632_uniq UNIQUE (user_id, permission_id);
 �   ALTER TABLE ONLY public.auth_user_user_permissions DROP CONSTRAINT auth_user_user_permissions_user_id_permission_id_14a6b632_uniq;
       public            postgres    false    217    217            Y           2606    17124 $   authtoken_token authtoken_token_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.authtoken_token
    ADD CONSTRAINT authtoken_token_pkey PRIMARY KEY (key);
 N   ALTER TABLE ONLY public.authtoken_token DROP CONSTRAINT authtoken_token_pkey;
       public            postgres    false    238            [           2606    17126 +   authtoken_token authtoken_token_user_id_key 
   CONSTRAINT     i   ALTER TABLE ONLY public.authtoken_token
    ADD CONSTRAINT authtoken_token_user_id_key UNIQUE (user_id);
 U   ALTER TABLE ONLY public.authtoken_token DROP CONSTRAINT authtoken_token_user_id_key;
       public            postgres    false    238            =           2606    16951    company company_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.company
    ADD CONSTRAINT company_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.company DROP CONSTRAINT company_pkey;
       public            postgres    false    221            @           2606    16966     company_stuff company_stuff_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.company_stuff
    ADD CONSTRAINT company_stuff_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.company_stuff DROP CONSTRAINT company_stuff_pkey;
       public            postgres    false    223            D           2606    16989    customer customer_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.customer DROP CONSTRAINT customer_pkey;
       public            postgres    false    225            :           2606    16931 &   django_admin_log django_admin_log_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.django_admin_log
    ADD CONSTRAINT django_admin_log_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.django_admin_log DROP CONSTRAINT django_admin_log_pkey;
       public            postgres    false    219                       2606    16809 E   django_content_type django_content_type_app_label_model_76bd3d3b_uniq 
   CONSTRAINT     �   ALTER TABLE ONLY public.django_content_type
    ADD CONSTRAINT django_content_type_app_label_model_76bd3d3b_uniq UNIQUE (app_label, model);
 o   ALTER TABLE ONLY public.django_content_type DROP CONSTRAINT django_content_type_app_label_model_76bd3d3b_uniq;
       public            postgres    false    205    205                       2606    16807 ,   django_content_type django_content_type_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.django_content_type
    ADD CONSTRAINT django_content_type_pkey PRIMARY KEY (id);
 V   ALTER TABLE ONLY public.django_content_type DROP CONSTRAINT django_content_type_pkey;
       public            postgres    false    205                       2606    16799 (   django_migrations django_migrations_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.django_migrations
    ADD CONSTRAINT django_migrations_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.django_migrations DROP CONSTRAINT django_migrations_pkey;
       public            postgres    false    203            b           2606    17178 "   django_session django_session_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.django_session
    ADD CONSTRAINT django_session_pkey PRIMARY KEY (session_key);
 L   ALTER TABLE ONLY public.django_session DROP CONSTRAINT django_session_pkey;
       public            postgres    false    241            ^           2606    17148 .   fcm_django_fcmdevice fcm_django_fcmdevice_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.fcm_django_fcmdevice
    ADD CONSTRAINT fcm_django_fcmdevice_pkey PRIMARY KEY (id);
 X   ALTER TABLE ONLY public.fcm_django_fcmdevice DROP CONSTRAINT fcm_django_fcmdevice_pkey;
       public            postgres    false    240            U           2606    17101    history history_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.history
    ADD CONSTRAINT history_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.history DROP CONSTRAINT history_pkey;
       public            postgres    false    237            S           2606    17084    order order_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public."order"
    ADD CONSTRAINT order_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public."order" DROP CONSTRAINT order_pkey;
       public            postgres    false    235            E           1259    17035    api_product_company_id_851d9ab5    INDEX     ]   CREATE INDEX api_product_company_id_851d9ab5 ON public.api_product USING btree (company_id);
 3   DROP INDEX public.api_product_company_id_851d9ab5;
       public            postgres    false    227            J           1259    17041 !   api_variation_product_id_e7532f50    INDEX     a   CREATE INDEX api_variation_product_id_e7532f50 ON public.api_variation USING btree (product_id);
 5   DROP INDEX public.api_variation_product_id_e7532f50;
       public            postgres    false    229            M           1259    17047 %   api_variationtype_product_id_4c63bbe0    INDEX     i   CREATE INDEX api_variationtype_product_id_4c63bbe0 ON public.api_variationtype USING btree (product_id);
 9   DROP INDEX public.api_variationtype_product_id_4c63bbe0;
       public            postgres    false    231            P           1259    17053 5   api_variationtypeattribute_variation_type_id_aec11a3e    INDEX     �   CREATE INDEX api_variationtypeattribute_variation_type_id_aec11a3e ON public.api_variationtypeattribute USING btree (variation_type_id);
 I   DROP INDEX public.api_variationtypeattribute_variation_type_id_aec11a3e;
       public            postgres    false    233                       1259    16844    auth_group_name_a6ea08ec_like    INDEX     h   CREATE INDEX auth_group_name_a6ea08ec_like ON public.auth_group USING btree (name varchar_pattern_ops);
 1   DROP INDEX public.auth_group_name_a6ea08ec_like;
       public            postgres    false    209            !           1259    16857 (   auth_group_permissions_group_id_b120cbf9    INDEX     o   CREATE INDEX auth_group_permissions_group_id_b120cbf9 ON public.auth_group_permissions USING btree (group_id);
 <   DROP INDEX public.auth_group_permissions_group_id_b120cbf9;
       public            postgres    false    211            $           1259    16858 -   auth_group_permissions_permission_id_84c5c92e    INDEX     y   CREATE INDEX auth_group_permissions_permission_id_84c5c92e ON public.auth_group_permissions USING btree (permission_id);
 A   DROP INDEX public.auth_group_permissions_permission_id_84c5c92e;
       public            postgres    false    211                       1259    16843 (   auth_permission_content_type_id_2f476e4b    INDEX     o   CREATE INDEX auth_permission_content_type_id_2f476e4b ON public.auth_permission USING btree (content_type_id);
 <   DROP INDEX public.auth_permission_content_type_id_2f476e4b;
       public            postgres    false    207            '           1259    16890    auth_user_email_1c89df09_like    INDEX     h   CREATE INDEX auth_user_email_1c89df09_like ON public.auth_user USING btree (email varchar_pattern_ops);
 1   DROP INDEX public.auth_user_email_1c89df09_like;
       public            postgres    false    213            ,           1259    16905 "   auth_user_groups_group_id_97559544    INDEX     c   CREATE INDEX auth_user_groups_group_id_97559544 ON public.auth_user_groups USING btree (group_id);
 6   DROP INDEX public.auth_user_groups_group_id_97559544;
       public            postgres    false    215            /           1259    16904 !   auth_user_groups_user_id_6a12ed8b    INDEX     a   CREATE INDEX auth_user_groups_user_id_6a12ed8b ON public.auth_user_groups USING btree (user_id);
 5   DROP INDEX public.auth_user_groups_user_id_6a12ed8b;
       public            postgres    false    215            2           1259    16919 1   auth_user_user_permissions_permission_id_1fbb5f2c    INDEX     �   CREATE INDEX auth_user_user_permissions_permission_id_1fbb5f2c ON public.auth_user_user_permissions USING btree (permission_id);
 E   DROP INDEX public.auth_user_user_permissions_permission_id_1fbb5f2c;
       public            postgres    false    217            5           1259    16918 +   auth_user_user_permissions_user_id_a95ead1b    INDEX     u   CREATE INDEX auth_user_user_permissions_user_id_a95ead1b ON public.auth_user_user_permissions USING btree (user_id);
 ?   DROP INDEX public.auth_user_user_permissions_user_id_a95ead1b;
       public            postgres    false    217            W           1259    17132 !   authtoken_token_key_10f0b77e_like    INDEX     p   CREATE INDEX authtoken_token_key_10f0b77e_like ON public.authtoken_token USING btree (key varchar_pattern_ops);
 5   DROP INDEX public.authtoken_token_key_10f0b77e_like;
       public            postgres    false    238            >           1259    16967 !   company_stuff_company_id_b09c7989    INDEX     a   CREATE INDEX company_stuff_company_id_b09c7989 ON public.company_stuff USING btree (company_id);
 5   DROP INDEX public.company_stuff_company_id_b09c7989;
       public            postgres    false    223            A           1259    16973    company_stuff_stuff_id_d460edbe    INDEX     ]   CREATE INDEX company_stuff_stuff_id_d460edbe ON public.company_stuff USING btree (stuff_id);
 3   DROP INDEX public.company_stuff_stuff_id_d460edbe;
       public            postgres    false    223            B           1259    17114    customer_owner_id_b704a31d    INDEX     S   CREATE INDEX customer_owner_id_b704a31d ON public.customer USING btree (owner_id);
 .   DROP INDEX public.customer_owner_id_b704a31d;
       public            postgres    false    225            8           1259    16942 )   django_admin_log_content_type_id_c4bce8eb    INDEX     q   CREATE INDEX django_admin_log_content_type_id_c4bce8eb ON public.django_admin_log USING btree (content_type_id);
 =   DROP INDEX public.django_admin_log_content_type_id_c4bce8eb;
       public            postgres    false    219            ;           1259    16943 !   django_admin_log_user_id_c564eba6    INDEX     a   CREATE INDEX django_admin_log_user_id_c564eba6 ON public.django_admin_log USING btree (user_id);
 5   DROP INDEX public.django_admin_log_user_id_c564eba6;
       public            postgres    false    219            `           1259    17180 #   django_session_expire_date_a5c62663    INDEX     e   CREATE INDEX django_session_expire_date_a5c62663 ON public.django_session USING btree (expire_date);
 7   DROP INDEX public.django_session_expire_date_a5c62663;
       public            postgres    false    241            c           1259    17179 (   django_session_session_key_c0390e0f_like    INDEX     ~   CREATE INDEX django_session_session_key_c0390e0f_like ON public.django_session USING btree (session_key varchar_pattern_ops);
 <   DROP INDEX public.django_session_session_key_c0390e0f_like;
       public            postgres    false    241            \           1259    17156 '   fcm_django_fcmdevice_device_id_a9406c36    INDEX     m   CREATE INDEX fcm_django_fcmdevice_device_id_a9406c36 ON public.fcm_django_fcmdevice USING btree (device_id);
 ;   DROP INDEX public.fcm_django_fcmdevice_device_id_a9406c36;
       public            postgres    false    240            _           1259    17155 %   fcm_django_fcmdevice_user_id_6cdfc0a2    INDEX     i   CREATE INDEX fcm_django_fcmdevice_user_id_6cdfc0a2 ON public.fcm_django_fcmdevice USING btree (user_id);
 9   DROP INDEX public.fcm_django_fcmdevice_user_id_6cdfc0a2;
       public            postgres    false    240            V           1259    17113    history_user_id_6457e0b2    INDEX     O   CREATE INDEX history_user_id_6457e0b2 ON public.history USING btree (user_id);
 ,   DROP INDEX public.history_user_id_6457e0b2;
       public            postgres    false    237            Q           1259    17090    order_customer_id_9da9253f    INDEX     U   CREATE INDEX order_customer_id_9da9253f ON public."order" USING btree (customer_id);
 .   DROP INDEX public.order_customer_id_9da9253f;
       public            postgres    false    235            p           2606    17030 9   api_product api_product_company_id_851d9ab5_fk_company_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.api_product
    ADD CONSTRAINT api_product_company_id_851d9ab5_fk_company_id FOREIGN KEY (company_id) REFERENCES public.company(id) DEFERRABLE INITIALLY DEFERRED;
 c   ALTER TABLE ONLY public.api_product DROP CONSTRAINT api_product_company_id_851d9ab5_fk_company_id;
       public          postgres    false    227    221    2877            q           2606    17036 A   api_variation api_variation_product_id_e7532f50_fk_api_product_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.api_variation
    ADD CONSTRAINT api_variation_product_id_e7532f50_fk_api_product_id FOREIGN KEY (product_id) REFERENCES public.api_product(id) DEFERRABLE INITIALLY DEFERRED;
 k   ALTER TABLE ONLY public.api_variation DROP CONSTRAINT api_variation_product_id_e7532f50_fk_api_product_id;
       public          postgres    false    229    2887    227            r           2606    17042 I   api_variationtype api_variationtype_product_id_4c63bbe0_fk_api_product_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.api_variationtype
    ADD CONSTRAINT api_variationtype_product_id_4c63bbe0_fk_api_product_id FOREIGN KEY (product_id) REFERENCES public.api_product(id) DEFERRABLE INITIALLY DEFERRED;
 s   ALTER TABLE ONLY public.api_variationtype DROP CONSTRAINT api_variationtype_product_id_4c63bbe0_fk_api_product_id;
       public          postgres    false    227    2887    231            s           2606    17048 W   api_variationtypeattribute api_variationtypeatt_variation_type_id_aec11a3e_fk_api_varia    FK CONSTRAINT     �   ALTER TABLE ONLY public.api_variationtypeattribute
    ADD CONSTRAINT api_variationtypeatt_variation_type_id_aec11a3e_fk_api_varia FOREIGN KEY (variation_type_id) REFERENCES public.api_variationtype(id) DEFERRABLE INITIALLY DEFERRED;
 �   ALTER TABLE ONLY public.api_variationtypeattribute DROP CONSTRAINT api_variationtypeatt_variation_type_id_aec11a3e_fk_api_varia;
       public          postgres    false    233    2892    231            f           2606    16850 O   auth_group_permissions auth_group_permissio_permission_id_84c5c92e_fk_auth_perm    FK CONSTRAINT     �   ALTER TABLE ONLY public.auth_group_permissions
    ADD CONSTRAINT auth_group_permissio_permission_id_84c5c92e_fk_auth_perm FOREIGN KEY (permission_id) REFERENCES public.auth_permission(id) DEFERRABLE INITIALLY DEFERRED;
 y   ALTER TABLE ONLY public.auth_group_permissions DROP CONSTRAINT auth_group_permissio_permission_id_84c5c92e_fk_auth_perm;
       public          postgres    false    207    211    2843            e           2606    16845 P   auth_group_permissions auth_group_permissions_group_id_b120cbf9_fk_auth_group_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.auth_group_permissions
    ADD CONSTRAINT auth_group_permissions_group_id_b120cbf9_fk_auth_group_id FOREIGN KEY (group_id) REFERENCES public.auth_group(id) DEFERRABLE INITIALLY DEFERRED;
 z   ALTER TABLE ONLY public.auth_group_permissions DROP CONSTRAINT auth_group_permissions_group_id_b120cbf9_fk_auth_group_id;
       public          postgres    false    209    211    2848            d           2606    16836 E   auth_permission auth_permission_content_type_id_2f476e4b_fk_django_co    FK CONSTRAINT     �   ALTER TABLE ONLY public.auth_permission
    ADD CONSTRAINT auth_permission_content_type_id_2f476e4b_fk_django_co FOREIGN KEY (content_type_id) REFERENCES public.django_content_type(id) DEFERRABLE INITIALLY DEFERRED;
 o   ALTER TABLE ONLY public.auth_permission DROP CONSTRAINT auth_permission_content_type_id_2f476e4b_fk_django_co;
       public          postgres    false    207    205    2838            h           2606    16897 D   auth_user_groups auth_user_groups_group_id_97559544_fk_auth_group_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.auth_user_groups
    ADD CONSTRAINT auth_user_groups_group_id_97559544_fk_auth_group_id FOREIGN KEY (group_id) REFERENCES public.auth_group(id) DEFERRABLE INITIALLY DEFERRED;
 n   ALTER TABLE ONLY public.auth_user_groups DROP CONSTRAINT auth_user_groups_group_id_97559544_fk_auth_group_id;
       public          postgres    false    2848    215    209            g           2606    16892 B   auth_user_groups auth_user_groups_user_id_6a12ed8b_fk_auth_user_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.auth_user_groups
    ADD CONSTRAINT auth_user_groups_user_id_6a12ed8b_fk_auth_user_id FOREIGN KEY (user_id) REFERENCES public.auth_user(id) DEFERRABLE INITIALLY DEFERRED;
 l   ALTER TABLE ONLY public.auth_user_groups DROP CONSTRAINT auth_user_groups_user_id_6a12ed8b_fk_auth_user_id;
       public          postgres    false    2859    215    213            j           2606    16911 S   auth_user_user_permissions auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm    FK CONSTRAINT     �   ALTER TABLE ONLY public.auth_user_user_permissions
    ADD CONSTRAINT auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm FOREIGN KEY (permission_id) REFERENCES public.auth_permission(id) DEFERRABLE INITIALLY DEFERRED;
 }   ALTER TABLE ONLY public.auth_user_user_permissions DROP CONSTRAINT auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm;
       public          postgres    false    207    217    2843            i           2606    16906 V   auth_user_user_permissions auth_user_user_permissions_user_id_a95ead1b_fk_auth_user_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.auth_user_user_permissions
    ADD CONSTRAINT auth_user_user_permissions_user_id_a95ead1b_fk_auth_user_id FOREIGN KEY (user_id) REFERENCES public.auth_user(id) DEFERRABLE INITIALLY DEFERRED;
 �   ALTER TABLE ONLY public.auth_user_user_permissions DROP CONSTRAINT auth_user_user_permissions_user_id_a95ead1b_fk_auth_user_id;
       public          postgres    false    2859    217    213            v           2606    17133 @   authtoken_token authtoken_token_user_id_35299eff_fk_auth_user_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.authtoken_token
    ADD CONSTRAINT authtoken_token_user_id_35299eff_fk_auth_user_id FOREIGN KEY (user_id) REFERENCES public.auth_user(id) DEFERRABLE INITIALLY DEFERRED;
 j   ALTER TABLE ONLY public.authtoken_token DROP CONSTRAINT authtoken_token_user_id_35299eff_fk_auth_user_id;
       public          postgres    false    2859    238    213            m           2606    16968 =   company_stuff company_stuff_company_id_b09c7989_fk_company_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.company_stuff
    ADD CONSTRAINT company_stuff_company_id_b09c7989_fk_company_id FOREIGN KEY (company_id) REFERENCES public.company(id) DEFERRABLE INITIALLY DEFERRED;
 g   ALTER TABLE ONLY public.company_stuff DROP CONSTRAINT company_stuff_company_id_b09c7989_fk_company_id;
       public          postgres    false    223    221    2877            n           2606    16974 =   company_stuff company_stuff_stuff_id_d460edbe_fk_auth_user_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.company_stuff
    ADD CONSTRAINT company_stuff_stuff_id_d460edbe_fk_auth_user_id FOREIGN KEY (stuff_id) REFERENCES public.auth_user(id) DEFERRABLE INITIALLY DEFERRED;
 g   ALTER TABLE ONLY public.company_stuff DROP CONSTRAINT company_stuff_stuff_id_d460edbe_fk_auth_user_id;
       public          postgres    false    223    213    2859            o           2606    17115 3   customer customer_owner_id_b704a31d_fk_auth_user_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_owner_id_b704a31d_fk_auth_user_id FOREIGN KEY (owner_id) REFERENCES public.auth_user(id) DEFERRABLE INITIALLY DEFERRED;
 ]   ALTER TABLE ONLY public.customer DROP CONSTRAINT customer_owner_id_b704a31d_fk_auth_user_id;
       public          postgres    false    213    225    2859            k           2606    16932 G   django_admin_log django_admin_log_content_type_id_c4bce8eb_fk_django_co    FK CONSTRAINT     �   ALTER TABLE ONLY public.django_admin_log
    ADD CONSTRAINT django_admin_log_content_type_id_c4bce8eb_fk_django_co FOREIGN KEY (content_type_id) REFERENCES public.django_content_type(id) DEFERRABLE INITIALLY DEFERRED;
 q   ALTER TABLE ONLY public.django_admin_log DROP CONSTRAINT django_admin_log_content_type_id_c4bce8eb_fk_django_co;
       public          postgres    false    2838    205    219            l           2606    16937 B   django_admin_log django_admin_log_user_id_c564eba6_fk_auth_user_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.django_admin_log
    ADD CONSTRAINT django_admin_log_user_id_c564eba6_fk_auth_user_id FOREIGN KEY (user_id) REFERENCES public.auth_user(id) DEFERRABLE INITIALLY DEFERRED;
 l   ALTER TABLE ONLY public.django_admin_log DROP CONSTRAINT django_admin_log_user_id_c564eba6_fk_auth_user_id;
       public          postgres    false    213    219    2859            w           2606    17166 J   fcm_django_fcmdevice fcm_django_fcmdevice_user_id_6cdfc0a2_fk_auth_user_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.fcm_django_fcmdevice
    ADD CONSTRAINT fcm_django_fcmdevice_user_id_6cdfc0a2_fk_auth_user_id FOREIGN KEY (user_id) REFERENCES public.auth_user(id) DEFERRABLE INITIALLY DEFERRED;
 t   ALTER TABLE ONLY public.fcm_django_fcmdevice DROP CONSTRAINT fcm_django_fcmdevice_user_id_6cdfc0a2_fk_auth_user_id;
       public          postgres    false    240    2859    213            u           2606    17108 0   history history_user_id_6457e0b2_fk_auth_user_id    FK CONSTRAINT     �   ALTER TABLE ONLY public.history
    ADD CONSTRAINT history_user_id_6457e0b2_fk_auth_user_id FOREIGN KEY (user_id) REFERENCES public.auth_user(id) DEFERRABLE INITIALLY DEFERRED;
 Z   ALTER TABLE ONLY public.history DROP CONSTRAINT history_user_id_6457e0b2_fk_auth_user_id;
       public          postgres    false    213    2859    237            t           2606    17103 /   order order_customer_id_9da9253f_fk_customer_id    FK CONSTRAINT     �   ALTER TABLE ONLY public."order"
    ADD CONSTRAINT order_customer_id_9da9253f_fk_customer_id FOREIGN KEY (customer_id) REFERENCES public.customer(id) DEFERRABLE INITIALLY DEFERRED;
 [   ALTER TABLE ONLY public."order" DROP CONSTRAINT order_customer_id_9da9253f_fk_customer_id;
       public          postgres    false    2884    225    235               �   x���A
�0���)r���I�t)�q��i!	UI$����XBE\���y��1ŬB.j(9�Z��[�Z���r�-$�I4��-{���!����9%_��Qm.�7�5��y�c�	e��0�j�Տ�8�8������ok�            x������ � �         ,   x�3��/(����4�2�L����4�2�L�O��K�4����� �8�            x������ � �      �      x������ � �      �      x������ � �      �   �  x�u�ˮ�0���)x�*�d}���RE��z�Ty��x<���f>;�/��M>�.����g�����Ͽ��l2��>���H�7�ȉ87_���o2Q�h�R_\-�׿�k�tnx&�mj�
%�b�� �x�J���@G1�7íǶ��cwh�H�Cآ��Y�,Z*�4���:��=)H���-�/�Y����B�T�% �������뗺�IJ�W�c����J�Gt[�|���+�|k�zl��V$�-����Le b�'!Bd%HL�46C�'���d*\e��� +x N=���}�;x���39��Q��;�q��=c���
�lcnS�x���F���%9��2y�!'�V�冧�жܣzQř�DL��o�z�W�s��:�c!u
���,�����'�>�����}n�B}�¥8u���Y���寲�������vKB���S� (�݀U�P,��P$9w|��W�͵*]2�nSWz��}'��-���S�1�g�;�of������=��9IՔ����A��	����ٚ9�S�[=��b�1��p^��b�0�ʬ <=fTZ�au�T�S!H��1��������'n�J% vN%8�
9	����<�=��?S��Ϳ0���&�`�Q�"�R��g}3����R         �   x���AO�@���+<pk����4�E�ژ��j�X@Z
�-E믗jb��If��}@V3��)␊3�z��-ʨ΀�$N�u}��i�2��e_��p��1A���QF��Lɒ,|��N����kY���)��M&���Jp��)�9�9�5���e���T��z����+�ay�����?Zǖ����u��`��I3���wL����-�0	j���e���ܨy0"��v����2��jUI            x������ � �            x������ � �            x������ � �      	      x�3�t���.�/J����� -��            x�3�4�4�4������ ��         �   x�U��n�0���S�h���������.����6��do�h$~[�~}�o���3�R��Hv�Z?~X�0�����2˙&�0��ˆ��v>� y�m�NT�d����%j4��RoJS�i�jr=`a��,N~⹍ ��z]x�Raȵ,/j	��hj�	Y�K�n$g	�QRc�����+�R�X���-ͦ�l�YE�kw_            x������ � �      �   �   x�e�]!�������.&�]�B	���Xc���|�)�l���-$Њ+�>R�;O!I�q�ȡD��8��&S�q��t��9�o�[�A���N��@�J�j(���Gc�i�÷������Z�=`��\�7'hV*��nE���3�C+R�ܤO7:��_��*.���'0;]<��M�Z����6n      �   �  x����r�0�����}'��<Kg4
�- W�i��]�N"ƽ�؃Ϸ:����~�����w�1�����u;dO�X�ᙙg� �gz�_�hC����.�t��o6PfA����ŕ�P%�Xh]�`/M��ql��*����]3��_e�YPrE�u��]�=��JL�R�=e�H��8n ��+B�#:7F��sKƮ�Fc*X f�(���k�q�9٩e��Zz9ț�ڣ�>����	��7���͆�*���L�5z�y��+��ҡ�C��������G��8;����?4\I�)e n��I��{�a�,~�l�y���� �H\=���Νm��ۺ8�D>���^��Ry�:+�2�_��n���	e��JUҙ��SdP�-�uR+�(tWY,l}��7�J�Ĵ�X��U25)P`7�&K!K�M��󢐲�����^�?^�HwMhS�n��F����ڗk,P&� ��}�Y0\�Ś��Y\}�1�S���\���,��P�c��@	��>�2�����[�:p�lR�0�ּ��z:��ra�&�s�[��̨�`���9f �AR�H]K��Az~��6�{Ô
�=��1�<'μ���<\.�R�8K7Ǐ�[iE�T�([�6���T����g�����IB�Ix_�PXA	Y`���c���=��	�RJ�A�_�c�#�)�9J>bP���Oyw����H�q��ٍMzy�6��"8O����?��z�            x������ � �            x������ � �         �   x�3�442�3 BCN���̜�D}S=��̼���b�3=Ck ���Z�D�Y���h*��&g�� ���[fQjZ~�>H�3(�����P��H��R��������T������\����,W� {-$�            x������ � �     