import React from 'react';
import { useStoreState } from 'easy-peasy';
import useWindowDimensions from '@/plugins/useWindowDimensions';
import ResourceBar from '@/components/elements/store/ResourceBar';
import StoreBanner from '@/components/elements/store/StoreBanner';
import PageContentBlock from '@/components/elements/PageContentBlock';

export default () => {
    const { width } = useWindowDimensions();
    const username = useStoreState((state) => state.user.data!.username);

    return (
        <PageContentBlock title={'Storefront Overview'}>
            <div className={'flex flex-row items-center justify-between mt-10'}>
                {width >= 1280 && (
                    <div>
                        <h1 className={'text-6xl'}>Hey, {username}!</h1>
                        <h3 className={'text-2xl mt-2 text-neutral-500'}>👋 Welcome to the store.</h3>
                    </div>
                )}
                <ResourceBar className={'w-full lg:w-3/4'} />
            </div>
            <div className={'lg:grid lg:grid-cols-1 gap-8 my-10'}>
                <StoreBanner
                    title={'Want to create a server?'}
                    className={'bg-storeone'}
                    action={'Create'}
                    link={'create'}
                />
            </div>
        </PageContentBlock>
    );
};
